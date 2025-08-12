<?php
?>
<html>
<head>
<title>VOLT2U</title>
<style>
    .botaorede
    {
        cursor: pointer;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        color: #fecb08;
        background: transparent;
        align-items: center;
    }

    input
    {
        background-color: black;
        border: none;
        color: #fecb08;
        font-size: 18px;
        padding: 8px;
        outline: none;
        font-size: 18px;
    }


    .botao
    {
        background-color: #32312e;
        color: #fecb08;
        font-size: 18px;
        padding: 15px;
    }

    body
    {
        background-color: gray;
    }
    label
    {
        font-size: 16px;
        font-weight: bold;
        display: block;
        margin-top: 10px;

    }
    .conjunto
    {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .criaconta 
    {
        position: absolute;
        top: 20px;
        right: 30px;
        cursor: pointer;
        font-size: 21px;
    }
    .SIGNUP
    {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
</style>
</head>



<body>
<div class="criaconta">CRIAR CONTA</div>
<div class="conjunto">
<div class="SIGNUP">
    <div>
        <label for="email">EMAIL</label>
        <input type="email" id="" placeholder="NOME@EXEMPLO.COM">
    </div>
    <div>
        <label for="senha">SENHA</label>
        <input type="password" id="" placeholder="DIGITE SUA SENHA AQUI">
    </div>
    <button class="botao">ENTRAR</button>
<div>

<div class="divisor">
    <div class="TITULO">VOLT2U LOGIN</div>
    <div class="linhadecima"></div>
    <div class="logov2u">TESTE</div>
    <div class="linhadebaixo"></div>
</div>

<div class="SIGNUPCOMREDES">
    <button class="botaorede">CONTINUAR COM GOOGLE</button>
    <button class="botaorede">CONTINUAR COM FACEBOOK</button>
</div>
</div>