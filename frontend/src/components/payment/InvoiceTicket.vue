<template>
    <div class="container" >
        <div>
            <div class="invoice-container" id="form-data">
                <div class="title">
                    <img src="../../assets/images/logo.png" alt="">
                    <h2>Your Invoice</h2>
                </div>
                <div class="card-container">
                    <div>
                        <h4>Unversity name:</h4>
                        <h4>Student name:</h4>
                        <h4>Student ID:</h4>
                        <h4>Student email:</h4>
                        <h4>Phone number:</h4>
                        <h4>Course:</h4>
                        <h4>Year of study</h4>
                        <h4>Type of payment:</h4>
                        <h4>Date of payment:</h4>
                    </div>
                    <div>
                        <p>: {{student.universtiy}}</p>
                        <p>: {{student.name}}</p>
                        <p>: {{student.id}}</p>
                        <p>: {{student.email}}</p>
                        <p>: {{student.phone_number}}</p>
                        <p>: {{student.course}}</p>
                        <p>: {{student.year}}</p>
                        <p>: {{student.type_payment}}</p>
                        <p>: {{student.date}}</p>
                    </div>
                </div>
            </div>
            <div class="btn">
                 <v-btn class="bg-purple">Cancel</v-btn>
                 <v-btn color="warning" @click="makePDF">Download!</v-btn>
            </div>
        </div>
    </div>
</template>

<script>
import html2canvas from 'html2canvas';
import jsPDF from 'jspdf';
export default {
  data() {
    return {
        student:{
            universtiy: "RUPP",
            name:"vibol phoung",
            id: 1111,
            email: 'vibol@gmail.com',
            phone_number: "0979273421",
            course: 'IT',
            year: 'Second year',
            type_payment: "Exam fee",
            date: "7/20/2023",
        }   
    }
  },
  methods:{
    makePDF(){
        console.log("hello");
        window.html2canvas = html2canvas;
          var doc = new jsPDF("p",'pt','a4');
          doc.html(document.querySelector("#form-data"),{
          callback: function(pdf){
              pdf.save('apply.pdf');
          }
          });
    }
  }
}
</script>
<style scoped>
    .title,.card-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 2px solid black;
        margin-bottom: 20px;
    }
    img{
        width:100px;
        height:100px;
    }
    .invoice-container{
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        width:500px;
        padding:40px;
        border-radius:10px;
        height: 80vh;
        
    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    h2{
        color:orange;
    }
    h4,p{
        margin-bottom: 10px;

    }
    .btn{
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>