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
  baseBuyerFees: number
  specialSellerFees: number
  extraAssociationFees: number
  storageFees: number
  total: number
}
