<template>
    <div class="container">
        <div class="row">
          <div class="col-12" v-if="$gate.isAdminorAuthor()">
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="card-title"> All products</h3>

                <div class="card-tools">
                   <button class="btn btn-success" @click="newModel" >Add New
                   <span><i class="fas fa-product-plus"></i></span>
                   </button>
                    <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Currency</th>
                    <th>Amount</th>
                    <th>Purpose</th>
                    <th>Marchant</th>
                    <th>Category</th>
                    
                    <!-- <th>Email</th>
                    <th>Type</th> -->
                    <th>Registared At</th>
                    <th>Action</th>
                  </tr>
              
                    <tr v-for="item in products.data" :key="item.id">
                    <td>{{item.id}}</td>
                    <td>{{item.title}}</td>
                    <td>{{item.currency}}</td>
                    <td>{{item.amount}}</td>
                    <td>{{item.purpose}}</td>
                    <td>{{item.marchant}}</td>
                    <td>{{item.type | upText}}</td>
                     <td>{{item.created_at |dateFormat}}</td>

                    <td><span class="tag tag-success">Approved</span></td>
                    <td>
                      <a href="#" class="edit" @click="editModel(item)">
                <i class="fas fa-edit"></i>

                      </a>|
                       <a href="#" class="delete" @click="deleteUser(item.id)">
              <i class="fas fa-trash-alt"></i>

                      </a>
                    </td>
                  </tr>
                 
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               
                <pagination :data="products"  @pagination-change-page="getResults">
	<span slot="prev-nav">&lt; Previous</span>
	<span slot="next-nav">Next &gt;</span>
</pagination>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        
        <!-- Button trigger modal -->
                <div v-if="!$gate.isAdminorAuthor()">
                        <not-found></not-found>
                 </div>

<!-- Mo$gatedal -->
<div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!editMode" id="addNewModal">Add New</h5>
        <h5 class="modal-title" v-show="editMode" id="addNewModal">Update product's Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editMode ? updateUser():createUser()">
           <div class="modal-body">
                  <div class="form-group">
                     <label>Title</label>
                      <input v-model="form.title" type="text" name="title"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                       <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                   <label for="exampleFormControlSelect1">Currency</label>
                   <select name="currency" v-model="form.currency" id="currency" class="form-control"
                     :class="{ 'is-invalid': form.errors.has('currency') }"> 
                    <option value="">Select product Role</option>
                   <option value ="INR">INR</option>
                     <option value ="USD">USD</option>
                       
      
                        </select>
                     <has-error :form="form" field="currency"></has-error>
                  </div>
                <div class="form-group">
                     <label>Amount</label>
                      <input v-model="form.amount" type="number" name="amount"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
                       <has-error :form="form" field="amount"></has-error>
                </div>
                   <div class="form-group">
                     <label>Purpose</label>
                      <textarea v-model="form.purpose" type="purpose" name="purpose"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('purpose') }"></textarea>
                       <has-error :form="form" field="purpose"></has-error>
                </div>
                 <div class="form-group">
                     <label>Marchant</label>
                      <textarea v-model="form.marchant" type="purpose" name="marchant"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('marchant') }"></textarea>
                       <has-error :form="form" field="marchant"></has-error>
                </div>
                 <div class="form-group">
                   <label for="exampleFormControlSelect1">Category</label>
                   <select name="type" v-model="form.type" id="type" class="form-control"
                     :class="{ 'is-invalid': form.errors.has('type') }"> 
                    <option value="">Select product Role</option>
                   <option value ="transport">Transport</option>
                     <option value ="Food">Food</option>
                       
      
                        </select>
                     <has-error :form="form" field="type"></has-error>
                  </div>
            <!-- <div class="form-group">
                     <label>Password</label>
                      <input v-model="form.password" type="password" name="password"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                       <has-error :form="form" field="password"></has-error>
                </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button v-show="editMode" type="submit"  class="btn btn-success">Update</button>
        <button v-show="!editMode" type="submit"  class="btn btn-primary">Create</button>
      </div>
     </form>
    </div>
   
  </div>

</div>
    </div>
</template>

<script>
    export default {

        data()
        {
            return{
              editMode:false,
               products :{},
                form:new Form({
                    id:'',
                   title: '',
                   currency: '',
                   amount: '',
                   purpose: '',
                   marchant: '',
                  
                   type: '',
                 
                   photo: ''
                })
            }
        },
        methods:{
           printme() {
             $('button').hide();
             $('.edit').hide();
             $('.card-footer').hide();
            window.print();
        },
          getResults(page = 1) {
		                	axios.get('api/product?page=' + page)
			                        	.then(response => {
				                    	this.products = response.data;
		          	     	});
	                	},
            updateUser(){
              //  console.log('editing data');
                this.$Progress.start();
               this.form.put('api/product/'+this.form.id)
               .then(()=>{
                 $('#addNewModal').modal('hide');
                    swal("yes! Your file has been updated!", {
                   icon: "success",
      
                    }
    
                   );
                 this.$Progress.finish();
                Fire.$emit('AfterCreate');

               }).catch(()=>{
                 this.$Progress.fail();
               });
            },
            editModel(product){
               this.editMode=true;
             $('#addNewModal').modal('show');
              this.form.fill(product);
          },
          newModel(){
            this.editMode=false;
            this.form.reset();
             $('#addNewModal').modal('show');
             
             
          },
          
            deleteUser(id)
           {
             swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  this.form.delete('api/product/'+id).then(()=>{
    if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
      
    }
    
    );
    Fire.$emit('AfterCreate');
  }
  }).catch(()=>{
    swal("Failed!","There was something wrong. ", "warning");
  })
   
});
           },

          loadUsers(){
            if(this.$gate.isAdminorAuthor()){
                    axios.get("api/product").then(({data})=>(this.products=data))
            }
               
          },
            createUser()
            {
              this.$Progress.start();
                this.form.post('api/product')
                .then(()=>{
 
                Fire.$emit('AfterCreate');
                $('#addNewModal').modal('hide')
                swal("Good job!", "You created product Successfully", "success");
                 this.$Progress.finish();
  
                
                })
                .catch(()=>{

                })
               
            }
        },
        created() {
          
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/findproduct?q=' + query)
                .then((data) => {
                    this.products = data.data
                })
                .catch(() => {
                })
            })
           this.loadUsers();
           Fire.$on('AfterCreate',() => {
               this.loadUsers();
           });
            // setInterval(()=>this.loadproducts(),3000);


        }
    }
</script>
