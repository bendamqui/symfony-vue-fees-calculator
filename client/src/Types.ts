// @todo check for ts enum
export type CarType = 'standard' | 'deluxe'

export interface CarTypeOption {
  value: CarType
  label: string
}

export interface FeeCalculatorPayload {
  price: number
  carType: CarType
}

export interface FeeCalculatorResult {
  price: number
  carType: CarType
  baseBuyerFee: number
  specialSellerFee: number
  extraAssociationFee: number
  storageFee: number
  total: number
}
