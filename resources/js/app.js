require('./bootstrap');

import Swiper, { Navigation, Pagination } from 'swiper'
window.Swiper = Swiper
Swiper.use([Navigation, Pagination])

import flatpickr from 'flatpickr'
window.flatpickr = flatpickr

import mapboxgl from 'mapbox-gl'
window.mapboxgl = mapboxgl

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
