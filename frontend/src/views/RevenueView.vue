<template>
    <div class="container">
      <div class="tableRevenue">
          <h1>Receitas</h1>
          <table>
            <thead>
                <tr>
                    <td>Codigo</td>
                    <td>Descrição</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in revenues.data" :key="index">
                    <td v-for="(column, indexColumn) in columns" :key="indexColumn">{{item[column]}}</td>
                    <td> 
                        <a :href="'/revenueNew/' + item.code">Editar</a>
                    </td>
                </tr>
            </tbody>
          </table>
        <input 
            type="submit" 
            value="Cadastrar" 
            onclick="window.location='/revenueNew/'"
            class="btn" /> 
        <input 
            type="submit" 
            value="Voltar" 
            onclick="window.location='/dashboard'"
            class="btn_back" /> 
        </div>
    </div>
</template>
  
<script>
  import axios from 'axios';

  export default {
    data: () => ({
        revenues: [],
        columns: ['code', 'description']
    }),
    methods: {
        getRevenues: async function() { 
            const {data} = await axios.get('revenue_index');

            this.revenues = data;
        }
    },
    created() {
        this.getRevenues();
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
  
  .tableRevenue {
      display: flex;
      flex-direction: column;
      background-color: #ffffff;
      border-radius: 7px;
      padding: 40px;
      box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.4);
      gap: 5px
  }
  
  .tableRevenue h1 {
      padding: 0;
      margin: 0;
      font-weight: 500;
      font-size: 2.3em;
  }
  
  .tableRevenue input {
      padding: 15px;
      font-size: 14px;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      margin-top: 5px;
      border-radius: 4px;
      transition: all linear 160ms;
      outline: none;
  }
  
  .tableRevenue input:focus {
      border: 1px solid #000000;
  }
  
  .tableRevenue label {
      font-size: 14px;
      font-weight: 600;
  }
  
  .tableRevenue a {
      display: inline-block;
      margin-bottom: 20px;
      font-size: 13px;
      color: #555;
      transition: all linear 160ms;
  }
  
  .tableRevenue a:hover {
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
</style>