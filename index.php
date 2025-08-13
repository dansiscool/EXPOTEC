<?php
?>
<html>
<head>
<title>VOLT2U</title>
<style>
    .divisor
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        margin: 0 50px;
    }
    .linhadivisor
    {
        width: 2px;
        background-color: gray;
    }
    .linhadivisor.baixo
    {
        height: 100px;
    }
    .linhadivisor.cima
    {
        height: 100px;
    }
    .logov2u
    {
        background-color: #FFD000;
        color: black;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        line-height: 60px;
        font-weight: bold;
        font-size: 22px;
    }
    .titulo
    {
        font-weight: bold;
        font-size: 24px;
        margin-bottom: 15px;
        color: #FFD000;
    }
    .botaorede
    {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        border: 2px solid white;
        background: transparent;
        color: #fecb08;
        font-size: 18px;
        font-weight: bold;
        padding: 15px;
        cursor: pointer;
    }
    input
    {
    background-color: black;
    border: none;
    border-bottom: 2px solid white;
    color: white;
    font-size: 16px;
    padding: 8px 0;
    outline: none;
    width: 100%;
    }
    .botao
    {
        background-color: #32312e;
        color: #fecb08;
        font-weight: bold;
        font-size: 18px;
        border: none;
        padding: 15px;
        cursor: pointer;
        width: 100%;
    }
    .signupcomredes
    {
        display: flex;
        flex-direction: column;
        gap: 20px;
        min-width: 400px;
    }
    body
    {
        background-color: black;
    }
    label
    {
    font-size: 14px;
    font-weight: bold;
    color: #FFD000;
    display: block;
    margin-bottom: 5px;
    }
    .conjunto 
    {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .criaconta
    {
        position: absolute;
        top: 20px;
        right: 30px;
        font-weight: bold;
        cursor: pointer;
        font-size: 18px;
        color: #fecb08;
    }
    .signup
    {
        display: flex;
        flex-direction: column;
        gap: 30px;
        min-width: 400px;
    }
</style>
</head>
<body>
<div class="criaconta">CRIAR CONTA</div>
<div class="conjunto">
<div class="signup">
    <div>
        <label for="email">EMAIL</label>
        <input type="email" id="" placeholder="NOME@EXEMPLO.COM">
    </div>
    <div>
        <label for="senha">SENHA</label>
        <input type="password" id="" placeholder="DIGITE SUA SENHA AQUI">
    </div>
    <button class="botao">ENTRAR</button>
</div>
<div class="divisor">
    <div class="titulo">VOLT2U LOGIN</div>
    <div class="linhadivisor cima"></div>
    <div class="logov2u">
        <img src="logovolt.png">
</div>
    <div class="linhadivisor baixo"></div>
</div>
<div class="signupcomredes">
    <button class="botaorede">CONTINUAR COM GOOGLE</button>
    <button class="botaorede">CONTINUAR COM FACEBOOK</button>
    </div>
</div>
</body>
</html>