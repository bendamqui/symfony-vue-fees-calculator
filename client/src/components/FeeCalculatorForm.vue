<template>
  <div class="input-group">
    <label for="price">Price</label>
    <input @input="onChange" type="number" id="price" v-model="payload.price" />
  </div>

  <div class="input-group">
    <label for="carType">Car Type</label>
    <select id="carType" v-model="payload.carType" @change="onChange">
      <option
        v-for="({ value, label }, index) in carTypeOptions"
        :value="value"
        :key="`car-type-${index}`"
      >
        {{ label }}
      </option>
    </select>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import type { CarTypeOption, FeeCalculatorPayload } from '@/Types.ts'

const emit = defineEmits(['form-ready'])

const carTypeOptions: CarTypeOption[] = [
  { value: 'standard', label: 'Standard' },
  { value: 'deluxe', label: 'Deluxe' },
]

const payload = ref<FeeCalculatorPayload>({
  price: 0,
  carType: 'standard',
})

const isValidPrice = (price: number) => price >= 1

const onChange = () => {
  if (isValidPrice(payload.value.price)) {
    emit('form-ready', payload.value)
  } else {
    console.log('@todo display hint message.')
  }
}
</script>
