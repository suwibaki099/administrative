@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection


@section('content')
<div class="container-fluid">
        <div class="row">
            <!-- HTML (DOM) sourced data  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border">
                    <div class="file-content">
       
            <div class="media">
             
                <div class="form-group mb-0">                          
                </div>
              </form>
              <div class="media-body text-end">
                <form class="d-inline-flex" action="#" method="POST" enctype="multipart/form-data" name="myForm">
                  <div class="btn btn-primary" onclick="getFile()"> <i data-feather="plus-square"></i>Add New</div>
                  <div style="height: 0px;width: 0px; overflow:hidden;">
                    <input id="upfile" type="file" onchange="sub(this)">
                  </div>
                </form>
                <div class="btn btn-outline-primary ms-2"><i data-feather="upload">   </i>Upload  </div>
              </div>
            </div>
          </div>
                       
                            
                            <table class="display" id="data-source-1" style="width:100%">
                            
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                        <th>Office</th>
                                        <th>CV</th>
                                        <th>Status</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>$320,800</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="sample.pdf') }}" target="_blank"><i
                                                    class="icofont icofont-file-pdf"></i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>t.nixon@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>$170,750</td>
                                        <td>Tokyo</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>g.winters@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>$86,000</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>a.cox@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>$433,060</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>c.kelly@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>$162,700</td>
                                        <td>Tokyo</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>a.satou@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>$372,000</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>b.williamson@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales Assistant</td>
                                        <td>$137,500</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>h.chandler@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                   
                                   
                                    <tr>
                                        <td>Martena Mccray</td>
                                        <td>Post-Sales support</td>
                                        <td>$324,050</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>m.mccray@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unity Butler</td>
                                        <td>Marketing Designer</td>
                                        <td>$85,675</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>u.butler@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Howard Hatfield</td>
                                        <td>Office Manager</td>
                                        <td>$164,500</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>h.hatfield@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hope Fuentes</td>
                                        <td>Secretary</td>
                                        <td>$109,850</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>h.fuentes@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Vivian Harrell</td>
                                        <td>Financial Controller</td>
                                        <td>$452,500</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>v.harrell@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Timothy Mooney</td>
                                        <td>Office Manager</td>
                                        <td>$136,200</td>
                                        <td>London</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>t.mooney@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jackson Bradshaw</td>
                                        <td>Director</td>
                                        <td>$645,750</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>j.bradshaw@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Olivia Liang</td>
                                        <td>Support Engineer</td>
                                        <td>$234,500</td>
                                        <td>Singapore</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>o.liang@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bruno Nash</td>
                                        <td>Software Engineer</td>
                                        <td>$163,500</td>
                                        <td>London</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>b.nash@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sakura Yamamoto</td>
                                        <td>Support Engineer</td>
                                        <td>$139,575</td>
                                        <td>Tokyo</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>s.yamamoto@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thor Walton</td>
                                        <td>Developer</td>
                                        <td>$98,540</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>t.walton@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Finn Camacho</td>
                                        <td>Support Engineer</td>
                                        <td>$87,500</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>f.camacho@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Serge Baldwin</td>
                                        <td>Data Coordinator</td>
                                        <td>$138,575</td>
                                        <td>Singapore</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>s.baldwin@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zenaida Frank</td>
                                        <td>Software Engineer</td>
                                        <td>$125,250</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>z.frank@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Zorita Serrano</td>
                                        <td>Software Engineer</td>
                                        <td>$115,000</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>z.serrano@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Acosta</td>
                                        <td>Junior Javascript Developer</td>
                                        <td>$75,650</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>j.acosta@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cara Stevens</td>
                                        <td>Sales Assistant</td>
                                        <td>$145,600</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>c.stevens@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hermione Butler</td>
                                        <td>Regional Director</td>
                                        <td>$356,250</td>
                                        <td>London</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>h.butler@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lael Greer</td>
                                        <td>Systems Administrator</td>
                                        <td>$103,500</td>
                                        <td>London</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-danger">Pending</span></td>
                                        <td>l.greer@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jonas Alexander</td>
                                        <td>Developer</td>
                                        <td>$86,500</td>
                                        <td>San Francisco</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-warning"> in process</span></td>
                                        <td>j.alexander@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shad Decker</td>
                                        <td>Regional Director</td>
                                        <td>$183,000</td>
                                        <td>Edinburgh</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>s.decker@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td>Javascript Developer</td>
                                        <td>$183,000</td>
                                        <td>Singapore</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>m.bruce@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Donna Snider</td>
                                        <td>Customer Support</td>
                                        <td>$112,000</td>
                                        <td>New York</td>
                                        <td class="action"> <a class="pdf" href="{{ asset('assets/pdf/sample.pdf') }}"
                                                target="_blank"><i class="icofont icofont-file-pdf"> </i></a></td>
                                        <td> <span class="badge rounded-pill badge-success">hired</span></td>
                                        <td>d.snider@datatables.net</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="#"><i class="icon-pencil-alt"></i></a>
                                                </li>
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- HTML (DOM) sourced data  Ends-->
            
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>   
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">  
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>


@endsection


@section('script')
@endsection
