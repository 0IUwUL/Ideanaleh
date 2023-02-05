@extends('layouts.default')

@section('content')
<x-styles.defnav/>
<style>
p{
  text-indent:4%;
}
.lists {
  text-indent:8%;
  background-color:none;
}
b{
  color:black
}
.textContainer{
  margin-top:2vh;
  margin-right:1.8em;
}

.title{
  font-size:1.3rem;
  font-weight: 500;
}
.text{
  color:rgb(105, 105, 105)
}
</style>

  <section id="header-hero" class="hero2 hero-dark p1">
      <div class="hero__container">
        <h1 class="hero__title">Privacy Policy</h1>
        <hr class="hero__divider">
        {{-- <p class="hero__text">
          Start your Clever Innovative Projects with hopes of Bringing Joy and Excitement for Everyone
        </p> --}}
      </div>
      <div class="container">
        <div class="row">
            <div class="termsContainer">
              <div class="textContainer">
                <ul><p><b><i>Ideanaleh takes your privacy very seriously.</i></b></p></ul>
                <ul><p>Ideanaleh collects information from you and all other users in order to facilitate accurate and timely processing of your transactions and to ensure an enhanced, encouraging, and satisfying environment.</p></ul>
                <p class="title"><b>COVERAGE<b></p>
                  <ul class="text">
                    <p>
                        This Privacy Policy indicates how Ideanaleh treats your user data. Through  Ideanaleh, we collect and receive payments for our services. Personal information is the data that can be used to identify you, such as your name, address, email address, landline, and cellphone numbers.
                    </p>
            
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title"><b>COLLECTION AND USE<b></p>
                <ul class="text">
                  <p>
                    Ideanaleh gathers information when you sign up for one of our services, 
                    utilize any of our promotions or features, or make a purchase. Ideanaleh may 
                    store and collect data such as your <b>name, email address, landline and cellphone numbers, 
                    birth date, gender, occupation, industry, personal interests, and financial information 
                    such as credit card or bank account numbers (depending on the payment method used)</b>. 
                    Ideanaleh also collects information about your transactions and any usage of the website's products and services.
                     Ideanaleh gathers and stores information from your computer and browser, such as your <b>IP address, cookie information, 
                     software and hardware attributes, and the page(s) you request, automatically</b>. 
                     These details are periodically used to notify and advise users of Ideanaleh's improvements, 
                     additional and special services, and other such information relevant to your use of Ideanaleh, 
                     as well as to offer, personalize, and optimize such services and customer support as you may request. 
                     These details will also be used to settle disputes, troubleshoot issues, and compare data for accuracy.
                  </p>
                </ul>
              </div>

              <div class="textContainer">
                <p class="title"><b>DISCLOSURE<b></p>
                <ul class="text">
                  <p>
                    Ideanaleh may disclose personal information to meet legal requirements, implement Ideanaleh policies, and respond to claims of postings and other contents that violate the rights of others, or protect anyone’s rights, property, security, or safety.
                  </p>
                  <p>Ideanaleh may also share these personal information to:</p>
                  <p class="lists">(a) Ideanaleh employees who we believe have to come into contact with that information to provide products and services to you;</p>
                  <p class="lists">(b) service providers under Ideanaleh contract who help with our business operations;</p>
                  <p class="lists">(c) other third parties whom you explicitly request us to send your information to;</p>
                  <p class="lists">(d) law enforcement and government official, in response to verified request relating to a criminal investigation or a criminal activity.</p>
                  <p class="lists">(e) other business entities, if we should plan to merge with, be acquired by, or be connected to that particular business entity.</p>
                </ul>
              </div>

              <div class="textContainer">
                <p class="title"><b>EDIT AND DELETE ACCOUNT INFORMATION AND PREFERENCES<b></p>
                <ul class="text">
                  <p>
                    You can make changes to your Ideanaleh Account Information at any time. Ideanaleh reserves the right to send you communications relating to Ideanaleh services, such as news releases, service notices, administrative messages, and any other information that we consider to be part of your Ideanaleh Account, without providing you with the option to opt out of receiving them.
                  </p>
                </ul>
              </div>

              <div class="textContainer">
                <p class="title"><b>CHANGES<b></p>
                <ul class="text">
                  <p>
                    Our PRIVACY POLICY is subject to change at our discretion, and any private information provided is not available for use other than by Ideanaleh and its sole agency, subject to all applicable laws. We may change our PRIVACY POLICY from time to time, and our changes become effective after we provide you with at least thirty (30) days' notice of the adjustments by submitting the adjustments in a prominent location on our website and broadcasting it to users who choose such notification via email, SMS, or any other available mode of communication.  
                  </p>
                </ul>
              </div>

              <div class="textContainer">
                <p class="title"><b>DISCLAIMER<b></p>
                <ul class="text">
                  <p>
                    Ideanaleh does not and will never collect member emails for phishing purposes. “Phishing” emails are scam emails sent by third parties using the name of legitimate companies to collect private information from its customers such as financial details like credit card numbers or passwords.
                  </p>
                  <p>Ideanaleh only sends emails to its members as notification or instructions for the transaction processes they have engaged in at Ideanaleh.</p>
                  <p>Ideanaleh will never ask for your personal information via any form of email. If you receive an email from Ideanaleh asking for your personal information and you have concerns about its authenticity, please do not hesitate to report it to us for verification and for proper security measures.</p>
                  <p>Unfortunately, no data transmission over the internet is 100% secure. As a result, while we try to protect your personal information, Ideanaleh cannot guarantee the security of any information you transit to us, and you do at your own risk.</p>
                  <p>If at anytime you wish to be completely removed from all our systems, or if you just want to update any personal data we have about you, then please send an email to:</p>
                  <p>ideanaleh@gmail.com</p>
                </ul>
              </div>
            </div>
        </div>
      
  </section>
  <x-styles.footer/>
@endsection