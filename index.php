<?php
require_once 'Block.php';
require_once 'BlockChain.php';

$chain = new BlockChain();
$block1 = new Block('转账10元');
$block2 = new Block('转账20元');
$block3 = new Block('转账30元');
$chain->addBlockChain($block1);
$chain->addBlockChain($block2);
$chain->addBlockChain($block3);
/**
 * 尝试篡改数据
 */
//$block2->data = '转账40元';
//$block2->hash = $block2->computeHash();
/**
 * 输出区块
 */
print_r($chain);
/**
 * 验证区块是否被篡改
 */
print_r($chain->validateChain());