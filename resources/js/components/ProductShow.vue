<template>
    <div class="container">
        <div class="row">
          <div class="col-12" v-if="$gate.isAdminorAuthor()">
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="card-title">Products</h3>

                <div class="card-tools">
                   <!-- <button class="btn btn-success" @click="newModel" >Add New
                   <span><i class="fas fa-product-plus"></i></span>
                   </button> -->
                 
                    <!-- <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                </div>
              </div>
                <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>ID</th>
                        <th>{{ product.id }}</th>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <th>{{ product.title }}</th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductShow',
    data() {
        return {
            product: {}
        };
    },

     watch: {
        '$route.params.id': function (id) {
            this.getItem();
        }
  },

    created() {
        this.getItem();
    },

    methods: {
        getItem() {
            axios.get(`/api/product/${this.$route.params.id}`)
            .then((data) => {
                console.log(data);
                this.product = data.data;
            }).catch((e) => {
                console.log(e)
            })
        }
    }
}
</script>
