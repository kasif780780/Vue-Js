<template>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                  <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ total }} Rs.</h3>

                <p>Expanses</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            
            </div>
               
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Draggable Events</h4>
              </div>
              <div class="card-body">
                <!-- the events -->
                <div id="external-events">
                  <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div>
                  <div class="external-event bg-warning ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
                  <div class="external-event bg-info ui-draggable ui-draggable-handle" style="position: relative;">Do homework</div>
                  <div class="external-event bg-primary ui-draggable ui-draggable-handle" style="position: relative;">Work on UI design</div>
                  <div class="external-event bg-danger ui-draggable ui-draggable-handle" style="position: relative;">Sleep tight</div>
                  <div class="checkbox">
                    <label for="drop-remove">
                      <input id="drop-remove" type="checkbox">
                      remove after drop
                    </label>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">
                <invoice></invoice>
              
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                total: null
            }
        },

        mounted() {
                axios.get(`/api/total`)
                .then(({data}) => {
                    // console.log(data)
                    this.total = data;
                })
                .catch((e) => {
                    console.log(e)
                })
        }
    }
</script>
