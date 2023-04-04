<template>
  <div class="container">
    <form @submit.prevent="submit" class="formRegister">
      <h1>Cadastro</h1>

      <label for="name">Nome</label>
      <input 
        type="text" 
        placeholder="Digite seu nome" 
        name="name" 
        required />

      <label for="email">E-mail</label>
      <input 
        type="email" 
        placeholder="Digite seu e-mail" 
        name="email" 
        required />

      <label for="password">Senha</label>
      <input 
        type="password"
        name="password"
        placeholder="Digite sua senha" 
        required />

      <input 
        type="submit" 
        value="Salvar" 
        class="btn" />

      <input 
        type="submit" 
        value="Voltar" 
        onclick="window.location='/';"
        class="btn_back" /> 
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import {useRouter} from "vue-router";

export default {
    name: "Register",
    setup() {
        const router = useRouter();

        const submit = async e => {
            const form = new FormData(e.target);

            const inputs = Object.fromEntries(form.entries());

            await axios.post('user_store', inputs);
            
            await router.push('/')
        }

        return {
            submit
        }
    }
}
</script>

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

.formRegister a {
    display: inline-block;
    margin-bottom: 20px;
    font-size: 13px;
    color: #555;
    transition: all linear 160ms;
}

.formRegister a:hover {
    color: #000000;
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

.btn_back:hover {
    transform: scale(1.05);
    background-color: #4b504c;

}

.btn_back {
    background-color: #4b504c;
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