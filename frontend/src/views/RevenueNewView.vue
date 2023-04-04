<template>
  <div class="container">
    <form @submit.prevent="submit" 
        class="formRegister">
      <h1>Cadastro</h1>
      <input 
        type="hidden"
        name="id" 
        v-model="revenues.id"/>
      <label for="code">Codigo</label>
      <input 
        type="code" 
        placeholder="Digite seu code" 
        name="email" 
        v-model="revenues.code"/>
      <label for="password">Descrição</label>
      <input 
        type="text"
        name="description"
        placeholder="Digite sua descrição" 
        v-model="revenues.description"/>
      <label for="password">Version</label>
      <input 
        type="text"
        disabled
        name="version"
        v-model="revenues.version"/>

      <table>
          <thead>
              <tr>
                <td>
                  <h2>Ingredientes</h2>
                </td>
                <td>
                    <button id="show-modal" v-on:click="showModal()">Adicionar</button>
                </td>
              </tr>
          </thead>
      </table>
      
      <table>
          <thead>
              <tr>
                <td>Ordem</td>
                <td>Codigo</td>
                <td>Descrição</td>
                <td>peso</td>
                <td>Ações</td>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(item, index) in revenues.ingredients" :key="index">
                  <td v-for="(column, indexColumn) in columns" :key="indexColumn">{{item[column]}}</td>
                  <td> 
                      <button v-on:click="removeItem(item.id)">Remover</button>
                  </td>
              </tr>
          </tbody>
      </table>

      <input 
        type="submit" 
        value="Salvar" 
        class="btn" />
      <input 
        type="submit" 
        value="Criar nova versão" 
        class="btn" />  
      <input 
        type="submit" 
        value="Voltar" 
        onclick="window.location='/revenue';"
        class="btn_back" /> 
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import {useRouter} from "vue-router";

export default {
    name: "RevenueNew",
    data: () => ({
        revenues: [],
        columns: ['position','code', 'description','amount']
    }),
    methods: {
        getRevenue: async function() { 
            var str = window.location.href;
            var code = str.charAt(str.length-1)

            if(code) { 
                const {data} = await axios.post('revenue_find_by_code', { "code": code } );
                this.revenues = data;
            }
        },

        postRevenues: async function() {
            const router = useRouter();

            const form = new FormData(e.target);

            const inputs = Object.fromEntries(form.entries());

            await axios.post('revenue_store', inputs);

            await router.push('/revenue')
        },

        removeItem: async function(id) {
            await axios.delete('item_delete',  { "id": id });
        },

        showModal: function() {
            
        }
    },
    created() {
        this.getRevenue();
    },
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
  font-size: 10px;
}
</style>