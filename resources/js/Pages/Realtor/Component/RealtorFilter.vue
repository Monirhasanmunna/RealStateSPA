<script setup>
  import { router } from '@inertiajs/vue3'
  import {watch, reactive, computed} from 'vue';

  const props = defineProps({
    filters:Object
  });

  const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? 'created_at',
    order: props.filters.order ?? 'desc',
  });

  watch([()=> filterForm.deleted, ()=>filterForm.by, ()=>filterForm.order], (newValue, oldValue) => {
    router.get(
      route('realtor.listing'),
      filterForm,
      {
        preserveScroll:true,
        preserveState:true
      }
    );
  });


  const sortLabels = {
    created_at: [
      {
        label: 'Latest',
        value: 'desc',
      },
      {
        label: 'Oldest',
        value: 'asc',
      },
    ],
    price: [
      {
        label: 'Pricey',
        value: 'desc',
      },
      {
        label: 'Cheapest',
        value: 'asc',
      },
    ],
}


const sortOptions = computed(() => sortLabels[filterForm.by])

</script>

<template>
    <form>
      <div class="mb-4 mt-4 flex flex-wrap gap-2">
        <div class="flex flex-nowrap items-center gap-2">
          <input
            id="deleted"
            v-model="filterForm.deleted"
            type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
          />
          <label for="deleted" class="dark:text-gray-300">Deleted</label>
        </div>

        <div>
        <select v-model="filterForm.by" class="input-filter-l w-24">
          <option value="created_at">Added</option>
          <option value="price">Price</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-32">
          <option
            v-for="option in sortOptions" 
            :key="option.value" :value="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>
      </div>
    </form>
</template>
  