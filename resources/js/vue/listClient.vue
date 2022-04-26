<template>
	<td>{{ item.Name }}</td>
	<td>{{ item.EmailAddress }}</td>
	<td>{{ item.Phone }}</td>
	<td>{{ item.Gender }}</td>
	<td>{{ item.Phone }}</td>
	<td>{{ item.Address }}</td>
	<td>{{ item.Nationality }}</td>
	<td>{{ item.DOB }}</td>
	<td>{{ item.EducationBackground }}</td>
	<td>{{ item.ModeOfcontact }}</td>
</template>
<script>
export default {
	props: ['item']
}
</script>