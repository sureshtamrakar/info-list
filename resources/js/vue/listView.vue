<template>
	<div class="card mt-5">
		<div class="card-header">
			<h5 class="card-title">Client List</h5>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Gender</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Nationality</th>
					<th>Dob</th>
					<th>Education Background</th>
					<th>Mode of Contact</th>
					
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in items" :key="`items-${index}`">
					<list-client-vue :item="item"></list-client-vue>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
import listClientVue from "./listClient.vue"
export default {
	props: ['items'],
	components: {
		listClientVue
	}
}
</script>