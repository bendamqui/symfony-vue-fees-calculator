<template>
  <main>
    <div class="fee-card">
      <h2>💰 Fee Calculator</h2>
      <FeeCalculatorForm @formReady="handleFormReady" />
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

const fetchFee = async (payload: FeeCalculatorPayload) => {
  const response = await fetch(
    `/api/auction-car/fees?price=${payload.price}&carType=${payload.carType}`,
    {
      headers: { 'Content-Type': 'application/json' },
    },
  )
  return await response.json()
}
const handleFormReady = async (payload: FeeCalculatorPayload) => {
  result.value = await fetchFee(payload)
}
</script>
