<template>
  <div class="container">
    <div class="formRegister">
      <h1>Dashboard</h1>
      <input 
        type="submit" 
        value="Receitas" 
        onclick="window.location='/revenue';"
        class="btn" /> 
      <input 
        type="submit" 
        value="Ingredientes" 
        onclick="window.location='/ingredient';"
        class="btn" /> 
      <input 
        type="submit" 
        value="Sair" 
        onclick="window.location='/';"
        class="btn" /> 
    </div>
  </div>
</template>

<style>
*,
*::before,
body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 0;
    color: #023047
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    align-content: center;
    justify-content: center;
}

.formRegister {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    border-radius: 7px;
    padding: 40px;
    box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
    gap: 5px
}

.formRegister h1 {
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-size: 2.3em;
}

.formRegister input {
    padding: 15px;
    font-size: 14px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    margin-top: 5px;
    border-radius: 4px;
    transition: all linear 160ms;
    outline: none;
}

.formRegister input:focus {
    border: 1px solid #000000;
}

.formRegister label {
    font-size: 14px;
    font-weight: 600;
}

.btn {
    background-color: #2f7e3c;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    border: none !important;
    transition: all linear 160ms;
    cursor: pointer;
    margin: 0 !important;
}

.formRegister a {
  font-size: 20px;
  border-bottom: 30%;
}
</style>