<script setup>
  import { ref } from 'vue';
  import axios from 'axios';

  const orderId = ref('');
  const clientId = ref('');
  const order = ref([]);

  function getOrder(clientId,orderId){
    axios.get("http://localhost:8000/api/clientorder/"+ clientId + "/" + orderId)
      .then(response => {
        order.value = response.data;
      })
  }
</script>

<template>
  <div class="container py-4">
    <div class="row mb-3">
      <div class="col">
        <header class="bg-info py-3 text-white text-center">
          <h1 class="mb-0">Client Order</h1>
        </header>
      </div>
    </div>
    <div class="row justify-content-center mb-4">
      <div class="col-12 col-md-9 col-lg-6">
        <div class="mb-3">
          <label for="clientId" class="form-label">ClientId</label>
          <input id="clientId" type="number" class="form-control" v-model="clientId">
        </div>
        <div class="mb-3">
          <label for="orderId" class="form-label">OrderId</label>
          <input id="orderId" type="number" class="form-control" v-model="orderId">
        </div>
        <div class="mb-3 text-end">
          <button class="btn btn-info" @click="getOrder(clientId,orderId)">Search</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th>ClientId</th>
              <th>OrderId</th>
              <th>Customer Username</th>
              <th>Status</th>
              <th>Address</th>
              <th>Order Date</th>
              <th>Product</th>
              <th>Quantity</th>
           
            </tr>
          </thead>
          <tbody v-if="order.length >= 1">
            <tr>
              <td> {{order[0].customer_id}}</td>
              <td> {{order[0].id}}</td>
              <td> {{order[0].username}}</td>
              <td> {{order[0].status}}</td>
              <td> {{order[0].address}}</td>
              <td> {{order[0].order_date}}</td>
              <td> {{order[0].product_name}}</td>
              <td> {{order[0].ordered_quantity}}</td>
            
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>
