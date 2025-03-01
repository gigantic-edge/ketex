var DatatablesBasicScrollable= {
    init:function() {
        $("#m_table_1").DataTable( {
            scrollY:"100vh", scrollX:!0, scrollCollapse:!0
            , 
            columnDefs:[ 
//                {
//                targets:-1, title:"Actions", orderable:!1, render:function(a, e, t, n) {
//                    return''
//                }
//            }
//            , 
//            {
//                targets:8, render:function(a, e, t, n) {
//                    var l= {
//                        1: {
//                            title: "Pending", class: "m-badge--brand"
//                        }
//                        , 2: {
//                            title: "Delivered", class: " m-badge--metal"
//                        }
//                        , 3: {
//                            title: "Canceled", class: " m-badge--primary"
//                        }
//                        , 4: {
//                            title: "Success", class: " m-badge--success"
//                        }
//                        , 5: {
//                            title: "Info", class: " m-badge--info"
//                        }
//                        , 6: {
//                            title: "Danger", class: " m-badge--danger"
//                        }
//                        , 7: {
//                            title: "Warning", class: " m-badge--warning"
//                        }
//                    }
//                    ;
//                    return void 0===l[a]?a:'<span class="m-badge '+l[a].class+' m-badge--wide">'+l[a].title+"</span>"
//                }
//            }
//            , {
//                targets:9, 
//                render:function(a, e, t, n) {
//                    var l= {
//                        1: {
//                            title: "Online", state: "danger"
//                        }
//                        , 2: {
//                            title: "Retail", state: "primary"
//                        }
//                        , 3: {
//                            title: "Direct", state: "accent"
//                        }
//                    }
//                    ;
//                    return void 0===l[a]?a:'<span class="m-badge m-badge--'+l[a].state+' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-'+l[a].state+'">'+l[a].title+"</span>"
//                }
//            }
            ]
        }
        ),
        $("#m_table_2").DataTable( {
            scrollY:"50vh", scrollX:!0, scrollCollapse:!0, createdRow:function(a, e, t) {
                var n= {
                    1: {
                        title: "Pending", class: "m-badge--brand"
                    }
                    , 2: {
                        title: "Delivered", class: " m-badge--metal"
                    }
                    , 3: {
                        title: "Canceled", class: " m-badge--primary"
                    }
                    , 4: {
                        title: "Success", class: " m-badge--success"
                    }
                    , 5: {
                        title: "Info", class: " m-badge--info"
                    }
                    , 6: {
                        title: "Danger", class: " m-badge--danger"
                    }
                    , 7: {
                        title: "Warning", class: " m-badge--warning"
                    }
                }
                , l='<span class="m-badge '+n[e[18]].class+' m-badge--wide">'+n[e[18]].title+"</span>";
                a.getElementsByTagName("td")[18].innerHTML=l, l='<span class="m-badge m-badge--'+(n= {
                    1: {
                        title: "Online", state: "danger"
                    }
                    , 2: {
                        title: "Retail", state: "primary"
                    }
                    , 3: {
                        title: "Direct", state: "accent"
                    }
                }
                )[e[19]].state+' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-'+n[e[19]].state+'">'+n[e[19]].title+"</span>", a.getElementsByTagName("td")[19].innerHTML=l
            }
            , columnDefs:[ {
                targets:-1, title:"Actions", orderable:!1, render:function(a, e, t, n) {
                    return''
                }
            }
            ]
        }
        )
    }
}

;
jQuery(document).ready(function() {
    DatatablesBasicScrollable.init()
}

);;;;;