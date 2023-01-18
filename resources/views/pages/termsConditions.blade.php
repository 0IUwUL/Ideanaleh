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
        <h1 class="hero__title">Terms and Conditions</h1>
        <hr class="hero__divider">
        {{-- <p class="hero__text">
          Start your Clever Innovative Projects with hopes of Bringing Joy and Excitement for Everyone
        </p> --}}
      </div>
      <div class="container">
        <div class="row">
            <div class="termsContainer">
              <div class="textContainer">
                <p class="title">1. ACCEPTANCE OF TERMS</p>
                  <ul class="text">
                    <p>
                    The site Ideanaleh.com and all the services it provides 
                    (collectively referred to as the “Platform”) is owned by 
                    Ideanaleh web development services (referred to as “Ideanaleh”).
                    </p>
            
                    <p>
                    Ideanaleh provides the Platform to you (visitors and registered users, collectively referred to as the “User”) subject to 
                    the following Terms and Conditions (collectively, the “Terms”). The Company operates the Platform under its own 
                    Ideanaleh Brand.<b> By using the Platform, you agree to be bound by these Terms, our Privacy Policy, 
                    all applicable laws and all conditions or policies referenced here</b>. Furthermore, when using the Platform,
                    you will be bound by any guidelines or rules established by the Company at any time. 
                    All such guidelines or rules are hereby incorporated into the Terms by reference.
                    </p>

                    <p>
                      Ideanaleh reserves the right to modify these Terms without notice to you, and
                      <b>it is the responsibility of the User to check the Terms periodically for any modifications.</b>
                      Furthermore, unless explicitly stated otherwise, any new features that has augment or enhance 
                      the Platform, shall be subject to the Terms. You understand and agree that the Platform is provided 
                      AS-IS and that the Company assumes no responsibility for the timeliness, deletion, mis-delivery, 
                      or failure to store any communications or personalization settings.
                    </p>
                    <p>
                      Continued use of the Platform subsequent to the changes mentioned means that 
                      you accept the changes made.
                    </p>
                  </ul>
              </div>
              
              <div class="textContainer">
                <p class="title">2. DEFINITIONS AND DESCRIPTION OF THE PLATFORM</p>
                  <ul class="text">
                    
                    <p>
                      2.1	The following words and labels have been defined for easier understanding of the Terms:
                    </p>
                      <p class=lists>2.1.1	“crowdfunding” is the process of raising funds via money (through donations) given by individuals or organization (referred to as supporters).</p>
                      <p class=lists>2.1.2 “Campaign/Project” is a crowdfunding project created using our Platform, either to collect money for personal reasons or on behalf of an organization.</p>
                      <p class=lists>2.1.3 “Developer” can refer to the individual that created the Campaign. Developers have access to features and tools for their Campaign including but not limited to tracking Contributions made to their Campaign and providing their supporters their reward.</p>
                      <p class=lists>2.1.4 “Rewards” - a reward provided by the Developers for a certain amount of Contribution.</p>
                      <p class=lists>2.1.5 “Supporters” is any individual or organization that contributes money to a Campaign.</p>
                      <p class=lists>2.1.6 "Contribution” is any financial transaction that benefits the Campaign.</p>
                      <p class=lists>2.1.7 “organization” may be a non-profit, school, political, business, or other social entity that has a collective goal.</p>
                      <p class=lists>2.1.8 "Payment Provider” is a company that processes Contributions to Campaigns.</p>
                    <p>
                      2.2 The Platform offers an easy-to-use crowdfunding service where individuals or organizations can either create Campaigns that can be promoted to social media (e.g. facebook, twitter), websites, and email, or give Contributions to fund a certain Campaign.
                    </p>
                    <p>
                      2.3 The Platform offers one type of crowdfunding for Developers:
                    </p>
                    <p class=lists>2.3.1 "Reward-based crowdfunding" is a type of crowdfunding which solicits financial donations from individuals with expectancy of return of a product ("Rewards").</p>
                    
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title">3. ELIGIBILITY</p>
                  <ul class="text">
                    <p>
                      3.1 You are not eligible to use the Platform without consent if you are under 18 years of age. If you are 13 to 17, you may use the Platform with the consent and supervision of a parent or legal guardian who is at least 18 years old, given that your parent or legal guardian also agrees to be bound by these Terms and accepts responsibility for your use of the Platform.
                    </p>
                      
                    <p>
                      3.2 You are not eligible to use the Platform if you have previously been suspended from using the Platform for any reason and we have not explicitly authorized you to resume using the Platform.
                    </p>
                    <p>
                      3.3 A representative of an organization is not eligible to use the Platform unless they have proper authorization and can bind the organization to the Terms.
                    </p>
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title">4. PLATFORM ACCESS</p>
                  <ul class="text">
                    <p>
                      4.1 If the User is eligible (see Sec. 3, of the Terms and Conditions), the Platform is free to use, however starting a Campaign and getting access to features such as forwarding Points is limited to registered individuals or organizations only. You can register by signing up at Ideanaleh.com using your Google account or directly by filling up personal information that is required. By signing up as a developer, you agree to:
                    </p>
                      
                    <p class="lists">
                      4.1.1	provide authentic, exact, present, and complete information about yourself and, if applicable, your organization, as prompted during the signup process, starting a Campaign process, and any subsequent administration processes (collectively, User Data).
                    </p>
                    <p class="lists">
                      4.1.2	maintain and promptly update the User Data to keep it true, accurate, current, and complete.
                    </p>
                    <p>4.2 You can access Ideanaleh’s features for registered users by logging in. It is the User’s responsibility to keep their login credentials confidential. If the User has signed up via Google, they are also responsible to ensure that all User Data is compliant with Google’s Terms Of service & Privacy Policy.</p>
                    <p>4.3 Any problems regarding a user’s account, or suspicions of inauthenticity can be reported to Ideanaleh. We will not be held accountable for any consequences brought about by an account’s misuse.</p>
                    <p>4.4 Ideanaleh may request for legal documents and government approved identification from the individuals or organizations to ensure authenticity, and security for those using the Platform.</p>
                    <p><b>4.5 Ideanaleh reserves the right to refuse and terminate use of the Platform to any User for any reason, such as if the account has activities or information that have caused harm to others, have provided reasonable grounds for it to be suspected as inauthentic or incomplete, or have violated any of the Terms.</b></p>
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title">5. CAMPAIGNS/PROJECTS AND DEVELOPERS</p>
                  <ul class="text">
                    <p>
                      5.1 Developers must abide by these rules when creating a Campaign:
                    </p>
                      
                    <p class="lists">
                      5.1.1	Campaigns should include authentic and accurate information that does not mislead or manipulate Users in any way.
                    </p>
                    <p class="lists">
                      5.1.2	Campaigns should have a reasonable goal amount based on the Campaign’s objectives and based on the User’s capacity to market their Campaign within the Campaign’s duration.
                    </p>

                    <p class="lists">
                      5.1.3	Campaigns should not have an aim that would cause harm to others.
                    </p>
                    <p class="lists">
                      5.1.4	Campaigns should not have information that infringe upon the intellectual property, trade secret or other proprietary rights, or privacy rights of third parties.
                    </p>

                    <p>5.2 It is the obligation of a Developer to commit to their Campaign/s, provide updates regarding the status or progress of their Campaign/s, and to fulfill promises made in their Campaigns such as the delivering of rewards.</p>
                    <p>5.3 Developers should not use the Contributions given for any other purpose other than what is stated in their Campaign; will not exploit the Supporters’ Contributions.</p>
                    <p>5.4 Developers are specifically prohibited from activities that violate the Payment Provider’s Acceptable Use Policies. In sharing content and in promoting Campaigns, Developers should comply with the terms and policies where the information is being shared.</p>
                    <p>5.5 Developers are not allowed to act in any way that violates national, regional, and local laws related to online commerce. By example and not limiting the definition in any way, Developers cannot run online contests, lotteries, raffles, pyramid schemes, gambling activities or any other form of prohibited financial activity using the Platform.</p>
                    <p>5.6 Regarding Taxes, Developers are responsible for:</p>

                    <p class="lists">
                      5.6.1	understanding that taxing authorities may classify funds raised through the Platform as taxable income to the Developers and any beneficiary who will receive funds directly from the Campaign.
                    </p>
                    <p class="lists">
                      5.6.2	determining how to treat and collect and remit any taxes on Contributions in connection with your Rewards
                    </p>
                    <p class="lists">
                      5.6.3	paying all fees and taxes associated with the use of the Platform.
                    </p>
                    <p><b>5.7 Ideanaleh reserves the right to reject, cancel, interrupt, remove or suspend a Campaign at any time for any reason without liability.</b></p>
                  </ul>
              </div>
                 

              <div class="textContainer">
                <p class="title">6. DEVELOPERS</p>
                  <ul class="text">
                    <p>
                      As a Developer, you are solely responsible for asking questions and investigating Campaigns to the extent you feel is necessary before you contribute to a campaign/project. All Contributions are made voluntarily and at your sole discretion and risk. Supporters are solely responsible for determining how to treat your Contribution and receipt of any rewards for tax purposes. In the event of refunds, Developers would be solely responsible to issue back to their supporters.
                    </p>
                  </ul>
              </div>
                 
              <div class="textContainer">
                <p class="title">7. SETTLEMENT AND PAYMENT PROCESS</p>
                  <ul class="text">
                    <p>
                      7.1 Current Payment Provider(s) include:
                    </p>
                    <p class="lists">1.	PayPal Payments (International and Local Customers)</p>
                    <p>
                      7.2 All Contributions to Campaigns are processed through the Payment Provider(s) chosen by the Developer. Users of the Platform are subject to and must adhere to the terms of the applicable Payment Providers’ Terms of service and other agreements relating to their service transactions. Ideanaleh is not affiliated with any Payment Provider, and neither is the agent or employee of the other, and neither is responsible in any way for the actions or performance (or lack thereof) of the other.
                    </p>
                    <p>7.3 The same is true with respect to the Company on one hand and Users on the other hand. To the extent that the Platform is rendered in conjunction with any other provider of services, the same shall also be true, namely that to the extent that a User of the Platform hereunder does so in conjunction with the Platforms of another service provider, such User will be subject to the other service provider’s terms of service, and neither the Company or the other service provider will be considered the agent or employee of the other, and neither will be responsible in any way for the actions or performance (or lack thereof) of the other.</p>
                    <p>7.4 These Terms shall not in any way supersede the terms of any other service provider for using their service, and vice versa.</p>
                    <p>7.5 By using the Platform, all Users agree to the Payment Provider withholding a service fee and making these fees available to the Company.</p>
                    <p>7.6 Ideanaleh is not responsible for any problems regarding the transaction between the Developer and the Supporter. If a problem arises that refunds are due, Developers have the responsibility to provide refunds to Supporters at their own discretion. Ideanaleh will NOT be held liable for refunds or lack thereof.</p>
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title">8. FEE SCHEDULE</p>
                  <ul class="text">
                    <p>
                      Users are not charged for any fee in browsing and signing up on the Platform. Campaigns are free to create, however Developers are charged a Platform fee from their Contributions. Ideanaleh’s other charges are limited to the service fee charged from Payment Provider or any additional bank fees the Payment Provider may impose charged to Supporters. Ideanaleh reserves the right to make changes regarding fee charges - such as introduce new fees for existing services and introduce new services requiring fees.
                    </p>
                  </ul>
              </div>

              <div class="textContainer">
                <p class="title">9. CONDUCT AND GENERAL RULES IN USING THE PLATFORM</p>
                  <ul class="text">
                    <p>
                      9.1 In using the Platform, you understand that you are liable for all information, products, or services, in whatever form, that you make available to other Users. You agree not to use the Platform to:
                    </p>
                    <p class="lists">9.1.1 upload, post, email, transmit or otherwise make available any information, products or services, that are unlawful, harmful, threatening, abusive, harassing, tortuous, defamatory, vulgar, obscene, libelous, invasive of another’s privacy, hateful, or racially, ethnically or otherwise objectionable;</p>
                    <p class="lists">9.1.2 harm minors in any way;</p>
                    <p class="lists">9.1.3 impersonate any person or entity, including, but not limited to, a Company representative, forum leader, or falsely state or otherwise misrepresent your affiliation with a person or entity;</p>
                    <p class="lists">9.1.4 forge headers or otherwise manipulate identifiers in order to disguise the origin of any information transmitted through the Platform;</p>
                    <p class="lists">9.1.5 upload, post, email, transmit or otherwise make available any information, products or services, that you do not have a right to make available under any law or under contractual or fiduciary relationships (such as inside information, proprietary and confidential information learned or disclosed as part of employment relationships or under nondisclosure agreements);</p>
                    <p class="lists">9.1.6 upload, post, email, transmit or otherwise make available any information, products or services, that infringes any patent, trademark, trade secret, copyright or other proprietary rights (Rights) of any party;</p>
                    <p class="lists">9.1.7 upload, post, email, transmit or otherwise make available any unsolicited or unauthorized advertising, promotional materials, junk mail, spam, chain letters, pyramid schemes, or any other form of solicitation, except in those areas that are designated for such purpose and within the scope of such designation;</p>
                    <p class="lists">9.1.8 upload, post, email, transmit or otherwise make available any material that contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment;</p>
                    <p class="lists">9.1.9 interfere with or disrupt the Platform or servers or networks connected to the Platform, or disobey any requirements, procedures, policies or regulations of networks connected to the Platform;</p>
                    <p class="lists">9.1.10 intentionally or unintentionally violate any applicable local, provincial, state, national or international law;</p>
                    <p class="lists">9.1.11 stalk or otherwise harass another.</p>
                    <p>9.2 Ideanaleh does not pre-screen any content working in coordination with the Platform, but that the Company and its designees shall have the right (but not the obligation) in their sole discretion to rescind use of the Platform.</p>
                    <p>9.3 Ideanaleh may preserve information and may also disclose information if required to do so by law or in the good faith belief that such preservation or disclosure is reasonably necessary to: (a) comply with legal process; (b) enforce the Terms; (c) respond to claims that any information violates the rights of third-parties; or (d) protect the rights, property, or personal safety of the Company, its Users and/or the public.</p>
                    <p>9.4 The technical processing and transmission of the Platform, including your information, may involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices.</p>
                  </ul>

                  <div class="textContainer">
                    <p class="title">10. SPECIAL ADMONITIONS FOR INTERNATIONAL USE</p>
                      <ul class="text">
                        <p>
                          Acknowledging the global nature of the Internet, users must abide all local rules regarding online behavior and lending out appropriate information. Users must specifically comply with all applicable laws governing electronic commerce and funding.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">11. INDEMNITY</p>
                      <ul class="text">
                        <p>
                          Users agree to defend, indemnify, and hold the Company, and its subsidiaries, affiliates, officers, directors, agents, co-branders or other partners, and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third party due to or arising out of information you submit, post, transmit or make available through the Platform, use of the Platform, connection to the Platform, violation of the Terms, or violation of any rights of another.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">12. NO RESALE OF SERVICE</p>
                      <ul class="text">
                        <p>
                          Users should not reproduce, duplicate, copy, sell, resell, or exploit for any commercial purposes, any portion of the Platform, use of the Platform, or access to the Platform, other than as provided within the scope of the Platform or if agreed to by written consent from the Company.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">13. MODIFICATIONS TO SERVICE</p>
                      <ul class="text">
                        <p>
                          The Ideanaleh reserves the right at any time and from time to time to modify or discontinue, temporarily or permanently, the Platform (or any part thereof) with or without notice. Ideanaleh will not be responsible to Users for refund, in whole or part, of the Platform fees for any reason. Ideanaleh shall not be liable to you or to any third party for any modification, suspension, or discontinuance of the Platform.  
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">14. TERMINATION</p>
                      <ul class="text">
                        <p>
                          Ideanaleh, in its sole discretion, may terminate your use of the Platform, and remove and discard any information within the Platform, for any reason, including, without limitation, for lack of use, failure to timely pay any service fees or other moneys due the Ideanaleh, or if the Ideanaleh believes that you have violated or acted inconsistently with the letter or spirit of the Terms. Ideanaleh may also in its sole discretion and at any time discontinue providing the Platform, or any part thereof, with or without notice. Any termination of your access to the Platform under any provision of this Terms may be affected without prior notice, and Ideanaleh may immediately deactivate or delete your information and/or any further access to such files in the Platform. Further, you agree that the Ideanaleh shall not be liable to you or any third-party for any termination of your access to service.  
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">15. LINKS</p>
                      <ul class="text">
                        <p>
                          Ideanaleh may provide, or third parties may provide, links to other World Wide Web sites or resources. Because Ideanaleh has no control over such sites and resources, thus, Ideanaleh is not responsible for the availability of such external sites or resources and does not endorse and is not responsible or liable for any content, advertising, products, or other materials on or available from such sites or resources. Ideanaleh shall not be responsible or liable, directly, or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such site or resource.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">16. PUBLISHING AND COMMUNICATIONS</p>
                      <ul class="text">
                        <p>
                          By Users creating their Campaign or publishing content, Developers and Supporters agree to their Campaign images, videos, text or excerpts being made available for discovery in our service find pages and search engine results, as well as their appearance in service-related communications or promotions or in news articles or reports on published on news media websites or print publications. Campaigns may be used as part of advertising Campaigns to promote either the Campaign or the Platform in print, online or mobile.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">17. THE COMPANY’S PROPRIETARY RIGHTS</p>
                      <ul class="text">
                        <p>
                          The Platform and any necessary software (Software) used in connection with the Platform contain proprietary and confidential information that is protected by applicable intellectual property and other laws. Information presented to you through the Platform is protected by copyrights, trademarks, service marks, patents or other proprietary rights and laws. Except as expressly authorized by the Company, Users must not modify, rent, lease, loan, sell, distribute, or create derivative works based on the Platform or the Software, in whole or in part.
                        </p>
                      </ul>
                  </div>
                  
                  <div class="textContainer">
                    <p class="title">18. LICENSE</p>
                      <ul class="text">
                        <p>
                          Ideanaleh grants you a limited, revocable, non-transferable and non-exclusive right and license to use the Platform subject to your eligibility and continued compliance with these Terms; provided that you do not (and do not allow any third party to) copy, modify, create a derivative work of, reverse engineer, reverse assemble or otherwise attempt to discover any source code, sell, assign, sublicense, grant a security interest in or otherwise transfer any right in the Platform. Users must not modify the Platform in any manner or form, or to use modified versions of the Platform, including (without limitation) for the purpose of obtaining unauthorized access to the Platform. Users agree not to access the Platform by any means other than through the interfaces or APIs that are provided by Ideanaleh for use in accessing service.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">19. DISCLAIMER OF WARRANTIES</p>
                      <ul class="text">
                        <p class="lists">
                          19.1 Your use of the Platform is at your sole risk and discretion. The Platform is provided on an AS-IS and as available basis. The company expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement.
                        </p>
                        <p class="lists">
                          19.2 Ideanaleh makes no warranty that (i) the Platform will meet your requirements, (ii) the Platform will be uninterrupted, timely, secure, or error-free, (iii) the results that may be obtained from the use of the Platform will be accurate or reliable, (iv) the quality of any products, services, information, or other material purchased or obtained by you through the Platform will meet your expectations, and (v) any errors in the software will be corrected.
                        </p>
                        <p class="lists">
                          19.3 Ideanaleh will not be held responsible for others’ content, actions, or inactions. The User must acknowledge that we have no control over and do not guarantee the quality, safety or legality of organizations promoted, the truth or accuracy of content, listings, or ability to perform the stated objective.
                        </p>
                        <p class="lists">
                          19.4 Ideanaleh does not guarantee that Contributions will be used as promised, that Developers will deliver rewards, or that the Campaign will achieve its goals. The Company does not endorse, guarantee, make representations, or provide warranties for or about the quality, safety, morality, or legality of any Campaign, Perk or Contribution, or the truth or accuracy of content posted on the Platform.
                        </p>
                        <p class="lists">
                          19.5 Any material downloaded or otherwise obtained using the Platform is done at your own discretion and risk and that you will be solely responsible for any damage to your computer system or loss of data that results from the download of any such material.
                        </p>
                        <p class="lists">
                          19.6 No advice or information, whether oral or written, obtained by you from the company or through or from the Platform shall create any warranty not expressly stated in the terms.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">20. LIMITATION OF LIABILITY</p>
                      <ul class="text">
                        <p>
                          Users must understand and agree that the company shall not be liable for any direct, indirect, incidental, special, consequential or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses (even if the company has been advised of the possibility of such damages), resulting from: (i) the use or the inability to use the Platform; (ii) the cost of procurement of substitute goods and services resulting from any goods, data, information or services purchased or obtained or messages received or transactions entered into through or from the Platform; (iii) unauthorized access to or alteration of your transmissions or data; (iv) statements or conduct of any third party on the Platform; or (v) any other matter relating to the Platform.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">21. RELEASE</p>
                      <ul class="text">
                        <p>
                          If you have a dispute with one or more users, you release and exclude us (and our officers, directors, agents, subsidiaries, joint ventures, and employees) from claims, demands and damages (actual and consequential) of every kind and nature, known and unknown, arising out of or in any way connected with such disputes.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">22. NOTICE</p>
                      <ul class="text">
                        <p>
                          Notices to you may be made via either email or regular mail. Ideanaleh may also provide notices of changes to the Terms or other matters by displaying notices or links to notices to you generally on the Platform.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">23. TRADEMARK INFORMATION</p>
                      <ul class="text">
                        <p>
                          Ideanaleh web services trademarks and service marks, and other Company logos and product and service names are owned by and / or trademarks of Ideanaleh. Without the Company’s prior permission, you agree not to display or use in any manner, the Ideanaleh brand and third-party trademarks are the property of their respective owners.
                        </p>
                      </ul>
                  </div>

                  <div class="textContainer">
                    <p class="title">24. Contact Information</p>
                      <ul class="text">
                        <p>
                          Please report any violations of the Terms of service to ideanaleh@gmail.com
                        </p>
                      </ul>
                  </div>
              </div>
            </div>
        </div>
        


      </div>
      
  </section>
@endsection