<template>
  <div class="results">
    <h3>Fee Breakdown</h3>
    <div class="fee-item price-display">
      <span class="fee-name">Price</span>
      <span class="fee-value" id="price-result">{{ result?.price.toFixed(2) }}</span>
    </div>
    <div class="fee-item">
      <span class="fee-name">Car Type</span>
      <span class="fee-value" id="carType-result">{{ result?.carType }}</span>
    </div>

    <hr />

    <div class="fee-item">
      <span class="fee-name">Base Buyer Fees</span>
      <span class="fee-value" id="baseFees-result">{{ result?.baseBuyerFee.toFixed(2) }}</span>
    </div>
    <div class="fee-item">
      <span class="fee-name">Special Seller Fees</span>
      <span class="fee-value" id="specialSellerFees-result">{{
        result?.specialSellerFee.toFixed(2)
      }}</span>
    </div>
    <div class="fee-item">
      <span class="fee-name">Extra Association Fees</span>
      <span class="fee-value" id="extraAssociationFees-result">{{
        result?.extraAssociationFee.toFixed(2)
      }}</span>
    </div>
    <div class="fee-item">
      <span class="fee-name">Storage Fees</span>
      <span class="fee-value" id="storageFees-result">{{ result?.storageFee.toFixed(2) }}</span>
    </div>

    <div class="fee-item total">
      <span class="fee-name">Total</span>
      <span class="fee-value" id="total-result">{{ result?.total.toFixed(2) }}</span>
    </div>
  </div>
</template>
<script setup lang="ts">

import type { FeeCalculatorResult } from '@/Types.ts'

interface Props {
  result?: FeeCalculatorResult
}
defineProps<Props>()
</script>
