    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"invoices.unpaid":{"uri":"invoices\/unpaid","methods":["GET","HEAD"],"domain":null},"invoices.index":{"uri":"invoices","methods":["GET","HEAD"],"domain":null},"invoices.create":{"uri":"invoices\/create","methods":["GET","HEAD"],"domain":null},"invoices.store":{"uri":"invoices","methods":["POST"],"domain":null},"invoices.show":{"uri":"invoices\/{invoice}","methods":["GET","HEAD"],"domain":null},"invoices.edit":{"uri":"invoices\/{invoice}\/edit","methods":["GET","HEAD"],"domain":null},"invoices.update":{"uri":"invoices\/{invoice}","methods":["PUT","PATCH"],"domain":null},"invoices.destroy":{"uri":"invoices\/{invoice}","methods":["DELETE"],"domain":null},"invoices.print":{"uri":"invoices\/{invoice}\/print","methods":["GET","HEAD"],"domain":null},"customers.index":{"uri":"customers","methods":["GET","HEAD"],"domain":null},"customers.create":{"uri":"customers\/create","methods":["GET","HEAD"],"domain":null},"customers.store":{"uri":"customers","methods":["POST"],"domain":null},"customers.show":{"uri":"customers\/{customer}","methods":["GET","HEAD"],"domain":null},"customers.edit":{"uri":"customers\/{customer}\/edit","methods":["GET","HEAD"],"domain":null},"customers.update":{"uri":"customers\/{customer}","methods":["PUT","PATCH"],"domain":null},"customers.destroy":{"uri":"customers\/{customer}","methods":["DELETE"],"domain":null},"companies.index":{"uri":"companies","methods":["GET","HEAD"],"domain":null},"companies.create":{"uri":"companies\/create","methods":["GET","HEAD"],"domain":null},"companies.store":{"uri":"companies","methods":["POST"],"domain":null},"companies.show":{"uri":"companies\/{company}","methods":["GET","HEAD"],"domain":null},"companies.edit":{"uri":"companies\/{company}\/edit","methods":["GET","HEAD"],"domain":null},"companies.update":{"uri":"companies\/{company}","methods":["PUT","PATCH"],"domain":null},"companies.destroy":{"uri":"companies\/{company}","methods":["DELETE"],"domain":null},"statistics.index":{"uri":"statistics","methods":["GET","HEAD"],"domain":null}},
        baseUrl: 'http://invoices.test/',
        baseProtocol: 'http',
        baseDomain: 'invoices.test',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
