<template>
  <main>
    <div class="fee-card">
      <h2>💰 Fee Calculator</h2>

      <FeeCalculatorForm @formReady="handleFormReady" />
      <div v-if="error" class="error">{{ error }}</div>
      <div v-if="showIsFetching">Processing your request...</div>
      <FeeCalculatorBreakdown :result />
    </div>
  </main>
</template>

<script setup lang="ts">
import FeeCalculatorForm from './components/FeeCalculatorForm.vue'
import FeeCalculatorBreakdown from '@/components/FeeCalculatorBreakdown.vue'
import { ref } from 'vue'
import type { FeeCalculatorPayload, FeeCalculatorResult } from '@/Types.ts'

const result = ref<FeeCalculatorResult>()
const error = ref('')
const isFetching = ref(false)
const showIsFetching = ref(false)

const fetchFee = async (payload: FeeCalculatorPayload) => {
  const response = await fetch(
    `/api/auctioned-car/fees?price=${payload.price}&carType=${payload.carType}`,
    {
      headers: { 'Content-Type': 'application/json' },
    },
  )
  if (response.status !== 200) {
    throw new Error()
  }
  return response.json()
}

const handleFormReady = (payload: FeeCalculatorPayload) => {
  error.value = ''
  isFetching.value = true
  setTimeout(() => {
    if (isFetching.value) {
      showIsFetching.value = true
    }
  }, 1000)
  fetchFee(payload)
    .then((response) => (result.value = response))
    .catch(() => {
      error.value = 'Something went wrong'
    })
    .finally(() => {
      isFetching.value = false
      showIsFetching.value = false
    })
}
</script>
