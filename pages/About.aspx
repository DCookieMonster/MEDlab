<%@ Page MasterPageFile="~/MasterPage.master" AutoEventWireup="true" %>

<script runat="server">

    Protected Sub Page_Load(sender As Object, e As EventArgs)

    End Sub
</script>



<asp:Content ID="Content1" runat="server" ContentPlaceHolderID="ContentPlaceHolder1">
       <!-- Custom CSS for the 'Round About' Template -->
         <link href="styles/style.css"rel="stylesheet" />
     <div class="container">
    
        <div class="row wrap">

            <div class="col-lg-12">
                <h1 class="page-header" >About Us
                    <small>It's Nice to Meet You!</small>
                </h1>
                   <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">About</li>
                </ol>
                <p>The Medical Informatics Research Center is at Ben Gurion University (BGU), Beer Sheva. It is a university-wide multidisciplinary research center. 
                     The center capitalizes on the strengths of several participating groups from multiple BGU faculties, in particular, Engineering, Medicine, Natural Sciences, and Management. The Medical Informatics Research Center's core laboratory is located at the department of information systems engineering.</p>
            </div>
         
            <div>
                <div class="col-lg-12">
                    <h2 class="page-header" style="font-size: 28px">Our Team</h2>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                   
                    <h3>Yuval Shahar
                        <small>Associate Professor</small>
                    </h3> 
                    <img class="img-circle img-responsive pull-right" src="img/Yuval-BGU-picture.jpg" height="150"width="150">
                    <p>  Informationtion Systems Engineering
                        Head, Medical Informatics Research Center
                        Head, Graduate Program, Information Systems Engineering</p>
                    <p>Phone:08-5648861</p>
                    <p>
E-mail:
<a href="mailto:someone@example.com" target="_top">
yuval@yuval.com</a>
</p>

                </div>
            </div>
              <div class="col-lg-12">
                    <h2 class="page-header">Dr.</h2>
                </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <img class="img-circle img-responsive pull-right" src="http://placehold.it/200x200">
                    <h3>Israel Israel
                        <small>Job Title</small>
                    </h3>
                    <p>Bla Bla Bla </p>
                </div>
              <div class="col-lg-12">
                    <h2 class="page-header">Ph.D</h2>
                </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <img class="img-circle img-responsive pull-right" src="http://placehold.it/200x200">
                    <h3>Israel Israel
                        <small>Job Title</small>
                    </h3>
                    <p>Bla Bla Bla </p>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <img class="img-circle img-responsive pull-right" src="http://placehold.it/200x200">
                    <h3>BGU BGU
                        <small>Job Title</small>
                    </h3>
                    <p>Be'er sheva</p>
                </div>
            </div>
        </div>

    

    </div>
    <!-- /container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
   </div>
</asp:Content>
 
