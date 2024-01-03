<template>
    <div>
      <h1>Daftar Pengguna</h1>
      <ul>
        <li v-for="user in users" :key="user.id">
          <inertia-link :href="`/users/${user.id}`">{{ user.name }}</inertia-link>
        </li>
      </ul>
    </div>
  </template>
  