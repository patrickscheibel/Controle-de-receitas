<template>
  <div class="container">
    <form @submit.prevent="submit" class="formLogin">
        <h1>Login</h1>
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
          value="Acessar" 
          class="btn" />
        <span>
          <p>Você não tem uma conta?</p>
          <a href="/register">Cadastrar</a>
        </span>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
  name: "Login",
  setup() {
      const router = useRouter();

      const submit = async e => {
          const form = new FormData(e.target);

          const inputs = Object.fromEntries(form.entries());

          const {data} = await axios.post('user_login', inputs, {
              withCredentials: true
          });

          if(data == true)
          {
            await router.push('/dashboard')
          }
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

.formLogin {
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    border-radius: 7px;
    padding: 40px;
    box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
    gap: 5px
}

.formLogin h1 {
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-size: 2.3em;
}

.formLogin input {
    padding: 15px;
    font-size: 14px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    margin-top: 5px;
    border-radius: 4px;
    transition: all linear 160ms;
    outline: none;
}


.formLogin input:focus {
    border: 1px solid #000000;
}

.formLogin label {
    font-size: 14px;
    font-weight: 600;
}

.formLogin a {
    display: inline-block;
    margin-bottom: 20px;
    font-size: 13px;
    color: #555;
    transition: all linear 160ms;
}

.formLogin a:hover {
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

.btn:hover {
    transform: scale(1.05);
    background-color: #2f7e3c;

}

.formLogin a {
  font-size: 15px
}

</style>