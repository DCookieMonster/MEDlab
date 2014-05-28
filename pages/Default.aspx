<%@ Page MasterPageFile="~/MasterPage.master" AutoEventWireup="true" %>

<script runat="server">

    Protected Sub Page_Load(sender As Object, e As EventArgs)

    End Sub
</script>


<asp:Content ID="Content1" runat="server" ContentPlaceHolderID="ContentPlaceHolder1">
    <div id="about" align="left">
        <h2 dir="rtl"><span style="color: rgb(255, 102, 51); font-family: Haettenschweiler; font-size: 24px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal;  text-align: left; text-indent: 0px; text-transform: capitalize; white-space: normal;  word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; direction: ltr;">The Medical Informatics Research Center</span></h2>
      <%--  <div id="ul" dir="rtl">
            <p>
               Medical Informatics is a relatively new multi-disciplinary area that involves application of multiple information sciences to the area of medical domain. Medical informatics is one of the fastest growing areas in the industrialized world, expected to change the way medicine is practiced in the 21st century.
            </p>
            <p>Our center focuses on the theoretical and practical development and investigation of computational tools, investigating their application within several closely collaborating medical centers, to support therapy, monitoring, follow up, clinical and pharmaceutical research, administrative decision making, health care policy making and patient involvement.</p>
            <p>The Medical Informatics Research Center is at Ben Gurion University (BGU), Beer Sheva. It is a university-wide multidisciplinary research center. 
The center capitalizes on the strengths of several participating groups from multiple BGU faculties, in particular, Engineering, Medicine, Natural Sciences, and Management. The Medical Informatics Research Center's core laboratory is located at the department of information systems engineering.</p>
        </div>--%>
       </div>
     <div class="container" style="background-color: white">

            <div class="row" style="background-color: white">
                <div class="col-lg-4 col-md-4">
                    <p>

                        <table style="width:100%; background-color: white">
                            <tr>
                                <td style="width: 155px">
                    <img class="img-responsive img-home-portfolio" src="img/Med-logo.png"></td>
                                <td style="width: 290px">Medical Informatics is a relatively new multi-disciplinary area that involves application of multiple information sciences to the area of medical domain. Medical informatics is one of the fastest growing areas in the industrialized world, expected to change the way medicine is practiced in the 21st century.
Our center focuses on the theoretical and practical development and investigation of computational tools, investigating their application within several closely collaborating medical centers, to support therapy, monitoring, follow up, clinical and pharmaceutical research, administrative decision making, health care policy making and patient involvement.</td>
                                <td>
                    The Medical Informatics Research Center is at Ben Gurion University (BGU), Beer Sheva. It is a university-wide multidisciplinary research center. 
                        The center capitalizes on the strengths of several participating groups from multiple BGU faculties, in particular, Engineering, Medicine, Natural Sciences, and Management. The Medical Informatics Research Center's core laboratory is located at the department of information systems engineering.
                    <p>The Medical Informatics Research Center is at Ben Gurion University (BGU), Beer Sheva. It is a university-wide multidisciplinary research center. 
                        The center capitalizes on the strengths of several participating groups from multiple BGU faculties, in particular, Engineering, Medicine, Natural Sciences, and Management. The Medical Informatics Research Center's core laboratory is located at the department of information systems engineering.</p>
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                            </table>
                    </p>
                </div>
            </div>
            <!-- /.row -->

        </div>
    <!-- /.container -->
     <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
</asp:Content>
 
