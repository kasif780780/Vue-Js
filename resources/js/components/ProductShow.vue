<template>
    <div class="container">
        <div class="row">
          <div class="col-12" v-if="$gate.isAdminorAuthor()">
            <div class="card mt-5">
              <div class="card-header bg-danger">
                <h3 class="card-title">Expanse</h3>

                <div class="card-tools">
                   <!-- <button class="btn btn-success" @click="newModel" >Add New
                   <span><i class="fas fa-product-plus"></i></span>
                   </button> -->
                 
                    <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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
                        <th>Date</th>
                        <th>{{product.created_at |dateFormat}}</th>
                        
                       
                    </tr>
                    <tr> <th>Title</th>
                        <th>{{ product.title }}</th></tr>
                        <tr>
                              <th>Currency</th>
                        <th>{{ product.currency }}</th>
                        </tr>
                        <tr>
                              <th>Purpose</th>
                        <th>{{ product.purpose }}</th>
                        </tr>
                         <tr>
                              <th>Marchant</th>
                        <th>{{ product.marchant }}</th>
                        </tr>
                         <tr>
                              <th>Category</th>
                        <th>{{ product.type }}</th>
                        </tr>
                         <tr>
                              <th>Amount</th>
                        <th>{{ product.amount }} Rs.</th>
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
          printme() {
             $('button').hide();
             $('.edit').hide();
             $('.card-footer').hide();
            window.print();
        },
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
