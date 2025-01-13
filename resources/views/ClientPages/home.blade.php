 <x-client-components.layout title=" Home Page" :categories="$categories" :electronics="$electronics" :furnitures="$furnitures" :clothings="$clothings" >
     <x-slot:title>
         HomePage-ReviewHub
     </x-slot>
     
     <main class="main">


         <x-client-components.slider :sliders="$sliders" />
         <x-client-components.platform />
         <x-client-components.feature-product />
         <x-client-components.subscribe />
         <x-client-components.premium />
         <x-client-components.service-details />
         <x-client-components.popular-product :products="$products" />
         <x-client-components.toprate />
         <x-client-components.blogs />
         {{-- <x-client-components.news-letter/> --}}
     </main>
 </x-client-components.layout>
