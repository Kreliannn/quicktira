<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> About Us Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
  

button:hover{
  background-color:#7d8b68 !important;
  cursor: pointer;
  transition: 0.3s ease-in-out;
}

@media screen and (max-width: 321px){
  p{
    font-size:16px;
  }
  b{
    font-size:20px;
  }
  ul li {
    font-size:16px;
  }
  ol li{
    font-size:16px;
  }
  img{
    border-radius:100px;
  }
 
  
}

  </style>
    
</head>

<body>

  <?php require('public_component/navbar.php'); ?>
  
  
  <div class="container-fluid" style="margin-top:50px; border:none;">
    <div style="min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px; background-color: #f8f9fa;">
        <h2 class="text-center" style="margin-bottom: 40px; font-family: 'Rubik', sans-serif; font-size: clamp(3rem, 6vw, 5rem); color: #4c583a; text-transform: uppercase; letter-spacing: 3px; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">About Us</h2>
        
        <h1 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; text-align: center; margin-bottom: 40px; font-weight: bold; color: #4c583a; font-size: clamp(1.2rem, 3vw, 2rem); max-width: 80%; line-height: 1.4; border-bottom: 2px solid #a5b68d; padding-bottom: 20px;"> 
            Transforming the Rental Experience: A Digital Platform for Efficient Property and Tenant Management for Clients in Dasmarinas, Cavite
        </h1>
       
        <h4 style="text-align: center; margin-bottom: 60px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: clamp(1rem, 2.5vw, 1.3rem); color: #626f47; max-width: 70%; line-height: 1.6;"> 
            Welcome to QuickTira! Discover our mission, vision, and values as we revolutionize property management in Dasmarinas, Cavite.
        </h4>
    <div class="d-flex justify-content-center mb-5">
        <a class="btn btn-lg mx-2" style="background-color: #626F47; color: white;" href="#mission">Mission</a>
        <a class="btn btn-lg mx-2" style="background-color: #626F47; color: white;" href="#vision">Vision</a>
        <a class="btn btn-lg mx-2" style="background-color: #626F47; color: white;" href="#values">Values</a>
    </div>

    </div>
    <div class="card" style="border:none;">
      <div class="card-header" id='mission'>
         <div class="card-body m-0 p-0 bg-light">
           <div class="row">
              <div class="col-sm-12 text-light text-justify" style="padding: 40px; padding-bottom:100px; opacity:1;background-color:#cbd6ba; border-radius: 10px; font-family: poppins">
                <div class="row">
                  <div class="col-sm-4 mt-3 text-left" style="font-size: 30px">
                    <b style=" font-family: Roboto sans-serif, Helvetica; color:#4c583a;"> Our Mission </b>
                    <div style="font-size:22px">
                    <p style="color:#4c583a;"> Empowering property owners and tenants through innovation, enhancing the rental experience with seamless digital solutions for efficient management in Dasmariñas, Cavite.
                      In addition, this highlights the goal of improving both property and tenant management through technology. </p> </div>
                  </div>
                  
                  <div class="col-sm-4 mt-3" style="text-align:center; font-size: 30px">
                    
                    <b style=" font-family: Roboto sans-serif, Helvetica; color:#4c583a;"> Why We Exist </b>
                    <div style="text-align:left">
                      <ul class="mt-1" style="color:#4c583a; font-size:21px;"> 
                        <li> Addressing Local Challenges in Dasmariñas, Cavite </li>
                        <li> Improving Efficiency through Digitization </li>
                        <li> Technological Advancements and Modernization </li>
                        <li> Creating a Competitive Advantage for Property Owners </li>
                        <li> Catering to a Growing Market in a Specific Locale </li>
                      </ul>
                    </div>
                  </div>
    
                  <div class="col-sm-4 mt-3" style="text-align:center; color:#4c583a; font-size: 30px">
                    <b style="font-family: Roboto sans-serif, Helvetica"> Features of Website </b>
                    <div style="text-align:left">
                      <ol class="mt-1" style="font-size:25px;">
                      <li> Property Management Dashboard
                      </li>
                      <li> Property Availability Tracker </li>
                      <li> Instant Live Chat </li>
                      <li> Ratings & Reviews </li>
                      <li> Notifications & Alerts </li>
                      <li> Customizable User Profiles </li>
                      </ol>
                    
                    </div>
                  </div>
                  <hr style="color:#223b05;" >
                  <div class="col-sm-12" style="text-align:center; color:#4c583a;">
                    <div style="text-align:left; font-size:25px; margin-top:40px;">
                      <p> Our goal is to improve the rental experience by offering a cutting-edge, intuitive digital platform that makes property and tenant administration in Dasmariñas, Cavite, easier. By providing effective tools for communication, seamless transaction processing, and all-inclusive management solutions, we hope to empower property owners, managers, and tenants. By incorporating technology, we hope to improve the whole experience and promote openness, ease of use, and confidence among all parties involved. Through the resolution of the particular issues in the neighborhood rental market, we are dedicated to building a more effective, reachable, and long-lasting rental ecosystem that serves both landlords and tenants.</p>
                    
                    </div>
                  </div>
                </div>
             </div>
             
              <div  id='vision' class="col-sm-12 text-white mt-2 img-fluid text-justify" style="padding:40px; padding-bottom:100px;background-color:#707e5b; opacity:0.8; border-radius:10px; font-family: poppins;">
                <div class="row" >
                  <div class="col-sm-12 mt-4 text-center">
                    <b style="font-size: 25px; font-family: Roboto sans-serif, Helvetica"> Our Vision </b>
                    <div style="font-size:22px; text-align:center; opacity:1">
                    <p> In developing the digital platform for property and tenant management, our vision is to revolutionize the rental experience in Dasmariñas, Cavite by introducing a seamless, user-friendly, and efficient system that caters to the needs of both property owners and tenants. We aim to leverage the latest technological advancements to create a streamlined process that simplifies the complexities of managing rental properties. Through this platform, we envision a transparent and secure ecosystem where property listings, tenant applications, lease agreements, rent payments, and maintenance requests are all managed digitally. This transformation will not only save time but also foster trust and reliability among users by ensuring clear communication and prompt responses to their needs.
                      <br><br>
                      At the heart of this vision is the goal to enhance the quality of life for tenants and improve operational efficiency for property owners. We seek to bridge the gap between traditional rental management practices and the modern demands of convenience and accessibility. By empowering property managers and owners with real-time data and advanced features, the platform will provide actionable insights for better decision-making. Tenants, on the other hand, will benefit from a hassle-free rental experience where they can easily track their tenancy, interact with landlords, and address concerns through a single digital interface. Ultimately, our vision is to create a transformative rental ecosystem that fosters long-term relationships, reduces friction, and promotes growth in the real estate sector of Dasmariñas.
                       </p></div>
                  </div>
                  
                  <hr>
                  
             </div> 
        </div>
        <div id='values' class="col-sm-12 mt-2" id="footerz" style="padding:40px; background-color:rgb(250, 243, 234); border-radius:10px;  opacity:1">
          <div class="row">
            <div class="col-sm-2">
              <b style="font-size: 25px; font-family: Roboto sans-serif, Helvetica; color:gray"> Our Values</b>
            </div>

            <div class="col-sm-10 haha" style="font-size:19px; font-family:poppins">
              
              <p style="color:gray;"> At the core of our digital platform for property and tenant management are values that guide every aspect of its development and implementation. First and foremost is: <br><br>
                <b>Efficiency </b>: our commitment to optimizing processes and eliminating unnecessary complexities for both property owners and tenants.
                <br><br>
                <b> Transparency </b>: ensuring that all interactions, from lease agreements to rent payments, are clear, fair, and accessible. This transparency fosters trust between property managers and tenants, creating a foundation for long-term, harmonious relationships.
                <br><br>
                <b> Innovation </b>: We strive to continuously improve the platform by integrating new technologies and features that meet the evolving needs of the rental market, ensuring that our users always benefit from the most up-to-date solutions. 
                <br><br>
                <b> User-centricity </b>: ensuring that every design decision is made with the convenience, security, and satisfaction of the user in mind—whether they are landlords, property managers, or tenants.
                <br><br>
                <b> Community </b>: Our platform is not just a tool for transactions; it is a space that connects people, encourages collaboration, and strengthens the rental ecosystem in Dasmariñas, Cavite. By upholding these values, we aim to create a transformative rental experience that positively impacts everyone involved. </p> 
            </div>
          </div>

         </div>

         <div class="col">
          <div class="col-sm-12 mt-5 text-center" style="text-align:center; font-size: 21px">
            <b style="font-family: Arial, Helvetica, sans-serif; font-size:30px;"> The Developers </b>
            <div class="row mt-2">
              <div class="col-sm-1">
                <!-- Blank -->
              </div>

              <div class="col-sm-2 mb-3">
                
                <img class="img-fluid shadow" src="image/website_image/rap.jpg" style="border-radius:10px;">
                <b> Rafael Baranda </b>
                <div style="font-size: 15px;">
                <p> Front-end Developer </p></div>
                
              </div>

              <div class="col-sm-2 mb-3">
                <img class="img-fluid shadow" src="image/website_image/badet.jpg" style="border-radius:10px;">
                <b> Marie Bernadet Landingin </b>
                <div style="font-size: 15px;;">
                  <p> Front-end Developer </p></div>
              </div>

              <div class="col-sm-2 mb-3">
                <img class="img-fluid shadow" src="image/website_image/marco.jpg" style="border-radius:10px;">
                <b> Mark James Abella </b>
                <div style="font-size: 15px;">
                <p> Project Manager </p></div>
              </div>

              <div class="col-sm-2 mb-3">
                <img class="img-fluid shadow" src="image/website_image/krel.jpg" style="border-radius:10px;">
                <b> Krelian Quimson </b>
                <div style="font-size: 15px;">
                  <p> Back-end Developer </p></div>
              </div>

              <div class="col-sm-2 mb-3">
                <img class="img-fluid shadow" src="image/website_image/josh.jpg" style="border-radius:10px;">
                <b> Joshua Velayo </b>
                <div style="font-size: 15px;">
                  <p> Back-end Developer </p></div>
              </div>
            </div>
          </div>
         </div>
      </div>
    </div>
    
  </div>
  <footer class="row text-light py-5" style="background-color: #626F47; margin-top: 0px; font-family: Poppins;" id='footer'>
                <div class="col-1"></div>
                <div class="col-md-2  ms-md-3 ms-0 text-center text-md-start">
                    <h4 class="mb-4" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Follow Us</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone mr-2"></i> Stay connected!</li> <br>
                        <li><i class="fas fa-envelope mr-2"></i> quicktira@gmail.com</li>
                        <li><i class="fas fa-envelope mr-2"></i> quicktiraFbPage</li>
                        <li><i class="fas fa-fax mr-2"></i> quicktiratiktok</li>
                        <li><i class="fas fa-mobile-alt mr-2"></i> quicktiraTg</li>
                    </ul>
                    <p class="mt-4">&copy; 2024 Quickitira. All Rights Reserved.</p>
                </div>
                <div class="col-md-3  ms-md-3 ms-0 text-center text-md-start">
                    <h4 class="mb-4" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Contact Our Team</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone mr-2"></i> Address: 123 Rental Lane, City, State, Zip</li> <br>
                        <li><i class="fas fa-phone mr-2"></i> 123-4567-890</li> 
                        <li><i class="fas fa-envelope mr-2"></i> 123-654-754</li> 
                        <li><i class="fas fa-fax mr-2"></i> 123-4567-890</li> 
                        <li><i class="fas fa-mobile-alt mr-2"></i> 1234567890</li>
                    </ul>
                   
                </div>
                <div class="col-md-5">
                    <h4 class="mb-4 ms-3" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Contact Form</h4>
                    <form class="mx-3 mx-md-0">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name" style="background-color: box-shadow: 0 0 5px black inset;  color: gray; box-shadow: 0 0 5px black inset">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" style="background-color: box-shadow: 0 0 5px black inset;  color: gray; box-shadow: 0 0 5px black inset">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Subject" style="background-color: box-shadow: 0 0 5px black inset;  color: gray; box-shadow: 0 0 5px black inset">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Message" style="background-color: box-shadow: 0 0 5px black inset;  color: gray; box-shadow: 0 0 5px black inset"></textarea>
                        </div>
                        <button type="submit" class="btn text-dark bg-light" style='background:#626F47'>Send Message</button>
                    </form>
                </div>
            </footer>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
