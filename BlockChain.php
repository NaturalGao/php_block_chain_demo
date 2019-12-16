<?php


/**
 * 区块链
 * Class chain
 */
class BlockChain
{
    public $chain = [];

    public function __construct()
    {
        array_push($this->chain, $this->bigBang());
    }

    public function addBlockChain(Block $block)
    {
        $block->previousHash = $this->getLastBlock()->hash;
        $block->hash = $block->computeHash();
        array_push($this->chain, $block);
    }

    public function validateChain()
    {
        if (count($this->chain) === 1) {
            $parentBlock = $this->chain[0];
            if ($parentBlock->hash != $parentBlock->computeHash()) {
                return '祖先区块被篡改';
            };
            return '数据链正常';
        }

        for ($i = 1; $i< count($this->chain);$i++){
            $currentBlock = $this->chain[$i];
            if ($currentBlock->hash !== $currentBlock->computeHash()){
                return '数据被篡改';
            }

            $previousBlock = $this->chain[$i-1];
            if ($previousBlock->hash !== $currentBlock->previousHash){
                return '前后区块断链';
            }
        }

        return '数据链正常';
    }

    private function getLastBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    private function bigBang()
    {
        return new Block('我是祖先区块', '');
    }
}
