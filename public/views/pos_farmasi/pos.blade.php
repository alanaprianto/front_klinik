<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>POS Farmasi .: Teknohealth :. </title>
    <link rel="icon" href="assets/images/logo/logo-sm.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="views/inventori/inventori.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
  </head>
  <body>
	<div class="loader" id="loader">
	  <div class="ui active dimmer">
		<div class="ui loader"></div>
	  </div>
	</div>

    <div class="module-left-aside">
        <div class="module-left-title">
            <div class="module-left-bars"><i class="ti-menu"></i></div>
            <img src="assets/images/logo/inventori.png">
            <span>Inventori</span>
        </div>
        <div class="module-left-container">
            <div class="module-left-nav clearfix">
                <div class="module-left-sidebar sidebar">
                    <nav class="sidebar-nav">
                        <ul class="metismenu" id="module-left-menu">
                            <li class="sidebar-nav-heading">Navigasi</li>
                            <li class="active">
                                <a href="#">
                                    <span class="sidebar-nav-item-icon fa fa-home fa-fw"></span>
                                    <span class="sidebar-nav-item">Beranda</span>        
                                </a>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-inbox fa-fw"></span>
                                    <span class="sidebar-nav-item">Inventori</span> 
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Database Obat & Alkes</a></li>
                                    <li><a href="#">Database Non Alkes</a></li>
                                    <li><a href="#">Database Vendor</a></li>
                                    <li><a href="#">Stok</a></li>
                                    <li><a href="#">Depo</a></li>
                                    <li><a href="#">Pengadaan</a></li>
                                    <li><a href="#">Laporan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-building fa-fw"></span>
                                    <span class="sidebar-nav-item">Depo</span> 
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Stok</a></li>
                                    <li><a href="#">Laporan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <span class="sidebar-nav-item-icon fa fa-cogs fa-fw"></span>
                                    <span class="sidebar-nav-item">Pengaturan</span> 
                                </a>
                                <ul class="module-left-dropdown" aria-expanded="false">
                                    <li><a href="#">Jasa Racikan</a></li>
                                    <li><a href="#">Depo</a></li>
                                </ul>
                            </li>

                            <li class="sidebar-nav-heading">Lain-lain</li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-nav-item-icon fa fa-sign-out fa-fw"></span>
                                    <span class="sidebar-nav-item">Keluar</span>        
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="module-content-container">
        <div class="container" style="text-align: justify">
            <div class="ui breadcrumb">
                <div class="section">Inventori</div>
                <div class="divider"> / </div>
                <div class="active section">Beranda</div>
            </div><br/>
        
            <table id="example" class="ui teal celled table compact display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                        <td>$372,000</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                        <td>$137,500</td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010/10/14</td>
                        <td>$327,900</td>
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                        <td>$205,500</td>
                    </tr>
                    <tr>
                        <td>Sonya Frost</td>
                        <td>Software Engineer</td>
                        <td>Edinburgh</td>
                        <td>23</td>
                        <td>2008/12/13</td>
                        <td>$103,600</td>
                    </tr>
                    <tr>
                        <td>Jena Gaines</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>30</td>
                        <td>2008/12/19</td>
                        <td>$90,560</td>
                    </tr>
                    <tr>
                        <td>Quinn Flynn</td>
                        <td>Support Lead</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2013/03/03</td>
                        <td>$342,000</td>
                    </tr>
                    <tr>
                        <td>Charde Marshall</td>
                        <td>Regional Director</td>
                        <td>San Francisco</td>
                        <td>36</td>
                        <td>2008/10/16</td>
                        <td>$470,600</td>
                    </tr>
                    <tr>
                        <td>Haley Kennedy</td>
                        <td>Senior Marketing Designer</td>
                        <td>London</td>
                        <td>43</td>
                        <td>2012/12/18</td>
                        <td>$313,500</td>
                    </tr>
                    <tr>
                        <td>Tatyana Fitzpatrick</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>19</td>
                        <td>2010/03/17</td>
                        <td>$385,750</td>
                    </tr>
                    <tr>
                        <td>Michael Silva</td>
                        <td>Marketing Designer</td>
                        <td>London</td>
                        <td>66</td>
                        <td>2012/11/27</td>
                        <td>$198,500</td>
                    </tr>
                    <tr>
                        <td>Paul Byrd</td>
                        <td>Chief Financial Officer (CFO)</td>
                        <td>New York</td>
                        <td>64</td>
                        <td>2010/06/09</td>
                        <td>$725,000</td>
                    </tr>
                    <tr>
                        <td>Gloria Little</td>
                        <td>Systems Administrator</td>
                        <td>New York</td>
                        <td>59</td>
                        <td>2009/04/10</td>
                        <td>$237,500</td>
                    </tr>
                    <tr>
                        <td>Bradley Greer</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>41</td>
                        <td>2012/10/13</td>
                        <td>$132,000</td>
                    </tr>
                    <tr>
                        <td>Dai Rios</td>
                        <td>Personnel Lead</td>
                        <td>Edinburgh</td>
                        <td>35</td>
                        <td>2012/09/26</td>
                        <td>$217,500</td>
                    </tr>
                    <tr>
                        <td>Jenette Caldwell</td>
                        <td>Development Lead</td>
                        <td>New York</td>
                        <td>30</td>
                        <td>2011/09/03</td>
                        <td>$345,000</td>
                    </tr>
                    <tr>
                        <td>Yuri Berry</td>
                        <td>Chief Marketing Officer (CMO)</td>
                        <td>New York</td>
                        <td>40</td>
                        <td>2009/06/25</td>
                        <td>$675,000</td>
                    </tr>
                    <tr>
                        <td>Caesar Vance</td>
                        <td>Pre-Sales Support</td>
                        <td>New York</td>
                        <td>21</td>
                        <td>2011/12/12</td>
                        <td>$106,450</td>
                    </tr>
                    <tr>
                        <td>Doris Wilder</td>
                        <td>Sales Assistant</td>
                        <td>Sidney</td>
                        <td>23</td>
                        <td>2010/09/20</td>
                        <td>$85,600</td>
                    </tr>
                    <tr>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2009/10/09</td>
                        <td>$1,200,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>28</td>
                        <td>2010/11/14</td>
                        <td>$357,650</td>
                    </tr>
                    <tr>
                        <td>Brenden Wagner</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>28</td>
                        <td>2011/06/07</td>
                        <td>$206,850</td>
                    </tr>
                    <tr>
                        <td>Fiona Green</td>
                        <td>Chief Operating Officer (COO)</td>
                        <td>San Francisco</td>
                        <td>48</td>
                        <td>2010/03/11</td>
                        <td>$850,000</td>
                    </tr>
                    <tr>
                        <td>Shou Itou</td>
                        <td>Regional Marketing</td>
                        <td>Tokyo</td>
                        <td>20</td>
                        <td>2011/08/14</td>
                        <td>$163,000</td>
                    </tr>
                    <tr>
                        <td>Michelle House</td>
                        <td>Integration Specialist</td>
                        <td>Sidney</td>
                        <td>37</td>
                        <td>2011/06/02</td>
                        <td>$95,400</td>
                    </tr>
                    <tr>
                        <td>Suki Burks</td>
                        <td>Developer</td>
                        <td>London</td>
                        <td>53</td>
                        <td>2009/10/22</td>
                        <td>$114,500</td>
                    </tr>
                    <tr>
                        <td>Prescott Bartlett</td>
                        <td>Technical Author</td>
                        <td>London</td>
                        <td>27</td>
                        <td>2011/05/07</td>
                        <td>$145,000</td>
                    </tr>
                    <tr>
                        <td>Gavin Cortez</td>
                        <td>Team Leader</td>
                        <td>San Francisco</td>
                        <td>22</td>
                        <td>2008/10/26</td>
                        <td>$235,500</td>
                    </tr>
                    <tr>
                        <td>Martena Mccray</td>
                        <td>Post-Sales support</td>
                        <td>Edinburgh</td>
                        <td>46</td>
                        <td>2011/03/09</td>
                        <td>$324,050</td>
                    </tr>
                    <tr>
                        <td>Unity Butler</td>
                        <td>Marketing Designer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009/12/09</td>
                        <td>$85,675</td>
                    </tr>
                    <tr>
                        <td>Howard Hatfield</td>
                        <td>Office Manager</td>
                        <td>San Francisco</td>
                        <td>51</td>
                        <td>2008/12/16</td>
                        <td>$164,500</td>
                    </tr>
                    <tr>
                        <td>Hope Fuentes</td>
                        <td>Secretary</td>
                        <td>San Francisco</td>
                        <td>41</td>
                        <td>2010/02/12</td>
                        <td>$109,850</td>
                    </tr>
                    <tr>
                        <td>Vivian Harrell</td>
                        <td>Financial Controller</td>
                        <td>San Francisco</td>
                        <td>62</td>
                        <td>2009/02/14</td>
                        <td>$452,500</td>
                    </tr>
                    <tr>
                        <td>Timothy Mooney</td>
                        <td>Office Manager</td>
                        <td>London</td>
                        <td>37</td>
                        <td>2008/12/11</td>
                        <td>$136,200</td>
                    </tr>
                    <tr>
                        <td>Jackson Bradshaw</td>
                        <td>Director</td>
                        <td>New York</td>
                        <td>65</td>
                        <td>2008/09/26</td>
                        <td>$645,750</td>
                    </tr>
                    <tr>
                        <td>Olivia Liang</td>
                        <td>Support Engineer</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2011/02/03</td>
                        <td>$234,500</td>
                    </tr>
                    <tr>
                        <td>Bruno Nash</td>
                        <td>Software Engineer</td>
                        <td>London</td>
                        <td>38</td>
                        <td>2011/05/03</td>
                        <td>$163,500</td>
                    </tr>
                    <tr>
                        <td>Sakura Yamamoto</td>
                        <td>Support Engineer</td>
                        <td>Tokyo</td>
                        <td>37</td>
                        <td>2009/08/19</td>
                        <td>$139,575</td>
                    </tr>
                    <tr>
                        <td>Thor Walton</td>
                        <td>Developer</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2013/08/11</td>
                        <td>$98,540</td>
                    </tr>
                    <tr>
                        <td>Finn Camacho</td>
                        <td>Support Engineer</td>
                        <td>San Francisco</td>
                        <td>47</td>
                        <td>2009/07/07</td>
                        <td>$87,500</td>
                    </tr>
                    <tr>
                        <td>Serge Baldwin</td>
                        <td>Data Coordinator</td>
                        <td>Singapore</td>
                        <td>64</td>
                        <td>2012/04/09</td>
                        <td>$138,575</td>
                    </tr>
                    <tr>
                        <td>Zenaida Frank</td>
                        <td>Software Engineer</td>
                        <td>New York</td>
                        <td>63</td>
                        <td>2010/01/04</td>
                        <td>$125,250</td>
                    </tr>
                    <tr>
                        <td>Zorita Serrano</td>
                        <td>Software Engineer</td>
                        <td>San Francisco</td>
                        <td>56</td>
                        <td>2012/06/01</td>
                        <td>$115,000</td>
                    </tr>
                    <tr>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013/02/01</td>
                        <td>$75,650</td>
                    </tr>
                    <tr>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011/12/06</td>
                        <td>$145,600</td>
                    </tr>
                    <tr>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011/03/21</td>
                        <td>$356,250</td>
                    </tr>
                    <tr>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>$103,500</td>
                    </tr>
                    <tr>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>30</td>
                        <td>2010/07/14</td>
                        <td>$86,500</td>
                    </tr>
                    <tr>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008/11/13</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011/06/27</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                </tbody>
            </table>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc finibus semper sem, in efficitur purus aliquam vitae. Nam libero turpis, interdum a vulputate at, varius ac odio. Vestibulum molestie, metus ac accumsan lobortis, tellus felis pharetra elit, id bibendum justo nulla quis nisi. Vivamus porttitor vitae ligula nec hendrerit. Ut at diam tellus. Aenean convallis arcu nec tellus venenatis porta. Proin sodales convallis ligula, sit amet gravida lectus ultrices et. Ut vel dictum magna, vitae fringilla sem. Quisque sollicitudin, purus vitae sagittis maximus, ipsum dolor blandit augue, quis ornare dui purus eu erat. Aliquam viverra lectus scelerisque velit efficitur, consectetur blandit lacus varius. Proin orci odio, suscipit ut facilisis sit amet, semper ut libero. Donec feugiat rhoncus convallis.
        </p>
        <p> 
            Curabitur malesuada, nisl id egestas aliquam, dolor diam aliquam odio, a bibendum mauris justo ut justo. Aliquam id tortor vel nisi porta venenatis et eget tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi varius consequat sem, at convallis diam lacinia vel. Cras enim lacus, suscipit at dictum eu, rhoncus sed massa. Vestibulum tincidunt accumsan massa, eget consequat massa tempor in. Nulla at dolor at sem convallis egestas. Cras elementum rhoncus urna, et luctus velit ornare quis. Integer tristique massa placerat sem facilisis gravida. Quisque sed porta elit, quis fermentum arcu. Sed et lectus vitae ipsum ultrices aliquet et convallis leo. Donec ac ipsum eget nulla aliquet ultricies. Aenean euismod feugiat nisi, ac efficitur est bibendum sit amet.
        </p>
        <p>
            Duis sit amet accumsan nisi. In hac habitasse platea dictumst. Ut pellentesque accumsan velit, eget interdum mi commodo ac. Nullam non augue eu lectus efficitur consequat. Vestibulum tellus erat, dapibus eu felis eget, condimentum mollis lacus. Curabitur sed rutrum libero, nec blandit velit. Suspendisse volutpat, purus vel sodales molestie, diam ex imperdiet nisi, bibendum elementum arcu nibh nec tellus.
        </p>
        <p>
            In lobortis consectetur mauris, in mollis tortor facilisis vel. Cras congue in eros eu accumsan. Morbi gravida placerat lorem nec iaculis. Ut congue maximus orci sed sodales. Sed auctor risus ut finibus cursus. Phasellus eu metus nisi. Vivamus sagittis ipsum vitae tellus accumsan cursus. Sed porta cursus lacus vitae accumsan. Pellentesque lorem nisl, auctor sed tristique ut, cursus at sapien. Ut libero urna, efficitur vel dolor vitae, pretium volutpat risus. Fusce quis semper felis, id cursus magna. Phasellus blandit libero ut purus convallis accumsan. Nunc finibus nulla in leo vehicula tempus. Praesent accumsan tempus nisi a elementum.
        </p>
        <p>
            Curabitur cursus velit metus, elementum hendrerit tortor faucibus nec. Sed eu tincidunt tortor, vel fringilla libero. Nunc ut ornare mi, quis dictum ex. Donec nec neque non ligula lacinia iaculis. Cras ac risus vel erat aliquet faucibus. Pellentesque vel varius nisi, eu iaculis purus. Aliquam et eros sit amet dolor interdum aliquet sit amet rutrum metus. Nam volutpat blandit maximus. Donec eget tortor nec orci elementum maximus. Curabitur quis tellus eget enim feugiat auctor ac at ipsum.
        </p>
        </div>
    </div>

    <!-- Main Javascript -->
    <script src="{{asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Plugins -->
    <script src="{{asset('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/semantic/semantic.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('/assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/dataTables.semanticui.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset ('/assets/plugins/datatables/js/responsive.semanticui.min.js')}}"></script>
    
    <script src="views/inventori/inventori.js"></script>
  </body>
</html>