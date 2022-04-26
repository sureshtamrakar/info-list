<template>
    <div class="card mt-5">
        <div class="card-header">
            <h5 class="card-title">Add Client</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="mb-2 list-group-item list-group-item-danger" v-for="item in error" v-bind:key="item">
                    {{ item }} not valid
                </li>
            </ul>
            <form>
                <div class="m-sm-4">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input class="form-control" v-model="item.name" type="text" name="name"
                                placeholder="Enter your Name" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input class="form-control" v-model="item.email" type="text" name="email"
                                placeholder="Enter your email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Phone</label>
                            <input class="form-control" v-model="item.phone" type="text" name="phone"
                                placeholder="Enter your phone" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Address</label>
                            <input class="form-control" v-model="item.address" type="text" name="address"
                                placeholder="Enter your address" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Nationality</label>
                            <input class="form-control" v-model="item.nationality" type="text" name="nationality"
                                placeholder="Enter your nationality" />
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Contact Mode</label>
                            <select name="contact" v-model="item.contact" class="form-control">
                                <option value="" selected="selected">Select</option>
                               
                                <option value="Phone">Phone</option>
                                <option value="Phone">Email</option>
                            </select>
                        </div>
                         <div class="mb-3 col-md-4">
                            <label class="form-label">DOB</label>
                            <input type="date" name="dob" v-model="item.dob" class="form-control">
                        </div>
                    </div>
                       
                        
                    <div class="row">

                    <div class="mb-3 col-md-6">
                            <label class="form-label">Gender</label>
                            <input name="gender" v-model="item.gender" value="male" type="radio"
                                class="form-check-input" />
                            Male
                            <input name="gender" v-model="item.gender" value="female" type="radio"
                                class="form-check-input" />
                            Female
                        </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Education background</label>
                            <textarea name="education" class="form-control" v-model="item.education"
                                placeholder="Textarea" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary" v-on:click="addItem" type="button">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function () {
        return {
            item: {
                name: "",
                email: "",
                phone: "",
                address: "",
                nationality: "",
                gender: "",
                contact: "",
                education: "",
            },
            error: [],
        };
    },
    methods: {
        addItem() {
            this.error = [];
            for (const field in this.item) {
                if (this.item[field] === "" || this.item[field].length === 0) {
                    this.error.push(field);
                }
            }
            if (this.error.length === 0) {
                axios
                    .post("api/client/create", {
                        item: this.item,
                    })
                    .then((response) => {
                        if (response.status == 200) {
                            this.error = [];
                            this.item = {
                                name: "",
                                email: "",
                                phone: "",
                                address: "",
                                nationality: "",
                                gender: "",
                                contact: "",
                                education: "",
                            };
                        }
                        if (response.data.error) {
                            this.error.push('email should be unique');
                        }
                    });
            }
        },
    },
};
</script>