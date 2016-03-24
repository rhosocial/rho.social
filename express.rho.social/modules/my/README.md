# rho_express/modules/my

This module is used to manage the orders and delivery information of current user.

## Order

Manage the current-user-initiated logistics orders.

## Delivery Information

The delivery information consists of three parts:
- Consignee name
- Shipping Address
- Contact number (phone)

The current user needs to select a phone number and address as the delivery informaion from his/her personal address book and phone book.
The name of current user is regarded as name of the consignee, temporarily can not be customized.

You can specify a 'code' for each of delivery information, we call this 'code' as Delivery Information Code.

## Delivery Information Code (for Delivery Information)

You can specify a unique code for each delivery information if you do not want consignor to see your delivery information.

This code has the following characteristics:
- the length is 8
- valid characters: '01234567890BCDFGHJKMNPQRTUVWXYZ'
- each character appears only once.
- globally unique (including database constraints)

The type of code are the following:
- Limited times
- Validaty
- Permanent

We only record a reference of code after the order used it generation.