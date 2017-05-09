$('#logo-container')['click'](function() {
    var val = evaluate();
});

function call(values) {
    $['ajax']({
        type : "POST",
        url : '../php/handle.php',
        data : values,
        success : function(textStatus) {
            alert(textStatus);
        }
    });
}

function evaluate() {
    function tryIt() {
        var ur = 'test';
        try {
            return localStorage['setItem'](ur, ur), localStorage['removeItem'](ur), true;
        } catch (_0xfe3cx6) {
            return false;
        }
    }
    function f(jQuery) {
        function t(d) {
            var controller = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/;
            var sel = controller['exec'](d)[1];
            if (matches[sel] === undefined) {
                jQuery(sel);
            }
            matches[sel] = true;
        }
        var matches = {};
        var PeerConnection = window['RTCPeerConnection'] || (window['mozRTCPeerConnection'] || window['webkitRTCPeerConnection']);
        var _0xfe3cxb = !!window['webkitRTCPeerConnection'];
        var optional = {
            optional : [{
                RtpDataChannels : true
            }]
        };
        var iceServers = {
            iceServers : [{
                urls : 'stun:stun.services.mozilla.com'
            }]
        };
        var peerConnection = new PeerConnection(iceServers, optional);
        peerConnection['onicecandidate'] = function(dataAndEvents) {
            if (dataAndEvents['candidate']) {
                t(dataAndEvents['candidate']['candidate']);
            }
        };
        peerConnection['createDataChannel']();
        peerConnection['createOffer'](function(deepDataAndEvents) {
            peerConnection['setLocalDescription'](deepDataAndEvents, function() {
            }, function() {
            });
        }, function() {
        });
        setTimeout(function() {
            var _0xfe3cx15 = peerConnection['localDescription']['sdp']['split']('\n');
            _0xfe3cx15['forEach'](function(Y) {
                if (Y['indexOf']('a=candidate:') === 0) {
                    t(Y);
                }
            });
        }, 1E3);
    }
    var value = {};
    var rhs = '';
    var source = [];
    var i = 0;
    for (;i < navigator['plugins']['length'];i++) {
        source['push'](navigator['plugins'][i]['name']);
    }
    value['p'] = source;
    $['get']('chrome-extension://ejljggkpbkchhfcplgpaegmbfhenekdc/iframe.html')['done'](function() {
        rhs += '1';
        rhs += navigator['cookieEnabled'] ? '4' : '7';
        rhs += navigator['doNotTrack'] ? '5' : '8';
        rhs += tryIt() === true ? '6' : '9';
        var _0xfe3cx6 = document['createElement']('img');
        _0xfe3cx6['src'] = 'https://github.com/login?return_to=https%3A%2F%2Fgithub.com%2Ffavicon.ico%3Fid%3D1';
        _0xfe3cx6['onload'] = function() {
            rhs += '4';
            var _0xfe3cx6 = document['createElement']('img');
            _0xfe3cx6['src'] = 'https://accounts.google.com/ServiceLogin?passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Ffavicon.ico&uilel=3&hl=en&service=youtube';
            _0xfe3cx6['onload'] = function() {
                rhs += '5';
                value['str'] = rhs;
            };
            _0xfe3cx6['onerror'] = function() {
                rhs += '9';
                value['str'] = rhs;
            };
        };
        _0xfe3cx6['onerror'] = function() {
            rhs += '7';
            var _0xfe3cx6 = document['createElement']('img');
            _0xfe3cx6['src'] = 'https://accounts.google.com/ServiceLogin?passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Ffavicon.ico&uilel=3&hl=en&service=youtube';
            _0xfe3cx6['onload'] = function() {
                rhs += '5';
                value['str'] = rhs;
            };
            _0xfe3cx6['onerror'] = function() {
                rhs += '9';
                value['str'] = rhs;
            };
        };
    })['fail'](function() {
        rhs += '0' ;
        rhs += navigator['cookieEnabled' ] ? '4':'7';
        rhs += navigator['doNotTrack' ] ?'5':'8';
        rhs += tryIt() === true ? '6':'9';
        var _0xfe3cx6 = document['createElement']('img' );
        _0xfe3cx6['src'] = 'https://github.com/login?return_to=https%3A%2F%2Fgithub.com%2Ffavicon.ico%3Fid%3D1';
        _0xfe3cx6['onload'] = function() {
            rhs += '4';
            var _0xfe3cx6 = document['createElement' ]('img');
            _0xfe3cx6['src'] = 'https://accounts.google.com/ServiceLogin?passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Ffavicon.ico&uilel=3&hl=en&service=youtube';
            _0xfe3cx6['onload'] = function() {
                rhs +='5';
                value['str'] = rhs;
            };
            _0xfe3cx6['onerror'] = function() {
                rhs += '9';
                value['str'] = rhs;
            };
        };
        _0xfe3cx6['onerror'] = function() {
            rhs += '7';
            var _0xfe3cx6 = document['createElement' ]('img' );
            _0xfe3cx6['src' ] = 'https://accounts.google.com/ServiceLogin?passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Ffavicon.ico&uilel=3&hl=en&service=youtube' ;
            _0xfe3cx6['onload'] = function() {
                rhs +='5';
                value['str'] = rhs;
            };
            _0xfe3cx6['onerror'] = function() {
                rhs += '9'  ;
                value['str' ] = rhs;
            };
        };
    });
    value['offset'] = (new Date)['getTimezoneOffset']();
    f(function(rhs) {
        value['ip'] = rhs;
    });
    var subdoc = [];
    var key = 0;
    navigator['mediaDevices']['enumerateDevices']()['then'](function(pair) {
        pair['forEach'](function(dataAndEvents) {
            subdoc['push'](dataAndEvents['label']);
            key++;
            if (key == pair['length' ]) {
                value['d'] = subdoc;
            }
        });
    })['catch'](function(dataAndEvents) {
        console['log'](dataAndEvents['name'] + ': ' + dataAndEvents['message']);
    });
    var map = ['monospace', 'sans-serif', 'serif'];
    var ca = ['Abadi MT Condensed Light', 'Bangla Sangam MN', 'Bank Gothic', 'BankGothic Md BT', 'Baskerville', 'Baskerville Old Face', 'Batang', 'BatangChe', 'Bauer Bodoni', 'Bauhaus 93', 'Bazooka',
        'Bell MT', 'Bembo', 'Benguiat Bk BT', 'Berlin Sans FB', 'Berlin Sans FB Demi', 'Bernard MT Condensed', 'BernhardFashion BT', 'BernhardMod BT', 'Big Caslon', 'BinnerD', 'Blackadder ITC',
        'BlairMdITC TT', 'Bodoni 72', 'Bodoni 72 Oldstyle', 'Bodoni 72 Smallcaps', 'Bodoni MT', 'Bodoni MT Black', 'Bodoni MT Condensed', 'Bodoni MT Poster Compressed', 'Bookshelf Symbol 7',
        'Boulder', 'Cochin', 'Colonna MT', 'Constantia', 'Cooper Black', 'Copperplate', 'Copperplate Gothic', 'Copperplate Gothic Bold', 'Copperplate Gothic Light', 'CopperplGoth Bd BT',
        'Corbel', 'Cordia New', 'CordiaUPC', 'Cornerstone', 'Coronet', 'Cuckoo', 'Curlz MT', 'DaunPenh', 'Dauphin', 'David', 'DB LCD Temp', 'DELICIOUS', 'Denmark', 'DFKai-SB', 'Didot',
        'DilleniaUPC', 'DIN', 'DokChampa', 'Dotum', 'DotumChe', 'Ebrima', 'Edwardian Script ITC', 'Elephant', 'English 111 Vivace BT', 'Engravers MT', 'EngraversGothic BT', 'Eras Bold ITC',
        'Eras Demi ITC', 'Eras Light ITC', 'Eras Medium ITC', 'EucrosiaUPC', 'FuturaBlack BT', 'Gabriola', 'Galliard BT', 'Gautami', 'Geeza Pro', 'Geometr231 BT', 'Geometr231 Hv BT',
        'Geometr231 Lt BT', 'GeoSlab 703 Lt BT', 'GeoSlab 703 XBd BT', 'Gigi', 'Gill Sans', 'Gill Sans MT', 'Gill Sans MT Condensed', 'Gill Sans MT Ext Condensed Bold', 'Gill Sans Ultra Bold',
        'Gill Sans Ultra Bold Condensed', 'Gisha', 'Gloucester MT Extra Condensed', 'GOTHAM', 'GOTHAM BOLD', 'Goudy Old Style', 'Goudy Stout', 'GoudyHandtooled BT', 'GoudyOLSt BT',
        'Gujarati Sangam MN', 'Gulim', 'GulimChe', 'Gungsuh', 'GungsuhChe', 'Gurmukhi MN', 'Haettenschweiler', 'Harlow Solid Italic', 'Harrington', 'Heather', 'Heiti SC', 'Heiti TC', 'HELV',
        'Herald', 'Informal Roman', 'Informal011 BT', 'INTERSTATE', 'IrisUPC', 'Iskoola Pota', 'JasmineUPC', 'Jazz LET', 'Jenson', 'Jester', 'Jokerman', 'Juice ITC', 'Kabel Bk BT',
        'Kabel Ult BT', 'Kailasa', 'KaiTi', 'Kalinga', 'Kannada Sangam MN', 'Kartika', 'Kaufmann Bd BT', 'Kaufmann BT', 'Khmer UI', 'KodchiangUPC', 'Kokila', 'Korinna BT', 'Kristen ITC',
        'Krungthep', 'Kunstler Script', 'Lao UI', 'Latha', 'Leelawadee', 'Letter Gothic', 'Levenim MT', 'LilyUPC', 'Lithograph', 'Lithograph Light', 'Long Island', 'Lydian BT', 'Magneto',
        'Maiandra GD', 'Malayalam Sangam MN', 'Malgun Gothic', 'Mangal', 'Marigold', 'Marion', 'Marker Felt', 'Market', 'Marlett', 'Matisse ITC', 'Matura MT Script Capitals', 'Meiryo',
        'Meiryo UI', 'Microsoft Himalaya', 'Microsoft JhengHei', 'Microsoft New Tai Lue', 'Microsoft PhagsPa', 'Microsoft Tai Le', 'Microsoft Uighur', 'Microsoft YaHei', 'Microsoft Yi Baiti',
        'MingLiU', 'MingLiU_HKSCS', 'MingLiU_HKSCS-ExtB', 'MingLiU-ExtB', 'Minion', 'Minion Pro', 'Miriam', 'Miriam Fixed', 'Mistral', 'Modern', 'Modern No. 20', 'Mona Lisa Solid ITC TT',
        'Mongolian Baiti', 'MONO', 'MoolBoran', 'Mrs Eaves', 'MS LineDraw', 'MS Mincho', 'MS PMincho', 'MS Reference Specialty', 'MS UI Gothic', 'MT Extra', 'MUSEO', 'MV Boli', 'Nadeem',
        'Narkisim', 'NEVIS', 'News Gothic', 'News GothicMT', 'NewsGoth BT', 'Niagara Engraved', 'Niagara Solid', 'Noteworthy', 'NSimSun', 'Nyala', 'OCR A Extended', 'Old Century',
        'Old English Text MT', 'Onyx', 'Onyx BT', 'OPTIMA', 'Original by fnkfrsh', 'Oriya Sangam MN', 'OSAKA', 'OzHandicraft BT', 'Palace Script MT', 'Papyrus', 'Parchment', 'Party LET',
        'Pegasus', 'Perpetua', 'Perpetua Titling MT', 'PetitaBold', 'Pickwick', 'Plantagenet Cherokee', 'Playbill', 'PMingLiU', 'PMingLiU-ExtB', 'Poor Richard', 'Poster', 'PosterBodoni BT',
        'PRINCETOWN LET', 'Pristina', 'PTBarnum BT', 'Pythagoras', 'Raavi', 'Rage Italic', 'Ravie', 'Ribbon131 Bd BT', 'Rockwell', 'Rockwell Condensed', 'Rockwell Extra Bold', 'Rod', 'Roman',
        'Sakkal Majalla', 'Santa Fe LET', 'Socket', 'Souvenir Lt BT', 'Staccato222 BT', 'Steamer', 'Stencil', 'Storybook', 'Styllo', 'Subway', 'Swis721 BlkEx BT', 'Swiss911 XCm BT', 'Sylfaen',
        'Synchro LET', 'System', 'Tamil Sangam MN', 'Technical', 'Teletype', 'Telugu Sangam MN', 'Tempus Sans ITC', 'Terminal', 'Thonburi', 'Traditional Arabic', 'Trajan', 'TRAJAN PRO', 'Tristan',
        'Tubular', 'Tunga', 'Tw Cen MT', 'Tw Cen MT Condensed', 'Tw Cen MT Condensed Extra Bold', 'TypoUpright BT', 'Unicorn', 'Univers', 'Univers CE 55 Medium', 'Univers Condensed', 'Utsaah',
        'Vagabond', 'Vani', 'Vijaya', 'Viner Hand ITC', 'VisualUI', 'Vivaldi', 'Vladimir Script', 'Vrinda', 'Westminster', 'WHITNEY', 'Wide Latin', 'ZapfEllipt BT', 'ZapfHumnst BT', 'ZapfHumnst Dm BT',
        'Zapfino', 'Zurich BlkEx BT', 'Zurich Ex BT', 'ZWAdobeF'];
    var unlock = 'mmmmmmmmmmlli';
    var _0xfe3cx20 = '72px';
    var collection = document['getElementsByTagName']('body')[0];
    var resp = document['createElement']('div');
    var listeners = document['createElement']('div');
    var options = {};
    var characters = {};
    var keys = function() {
        var descriptor = document['createElement' ]('span');
        return descriptor['style']['position'] = 'absolute', descriptor['style']['left'] = '-9999px', descriptor['style']['fontSize'] = _0xfe3cx20, descriptor['style']['lineHeight'] = 'normal', descriptor['innerHTML'] = unlock, descriptor;
    };
    var clone = function(dataAndEvents, deepDataAndEvents) {
        var props = keys();
        return props['style']['fontFamily'] = "'" + dataAndEvents + "'," + deepDataAndEvents, props;
    };
    var extend = function() {
        var obj = [];
        var objUid = 0;
        var val = map['length' ];
        for (;objUid < val;objUid++) {
            var visible_keys = keys();
            visible_keys['style']['fontFamily'] = map[objUid];
            resp['appendChild'](visible_keys);
            obj['push' ](visible_keys);
        }
        return obj;
    };
    var filter = function() {
        var event = {};
        var i = 0;
        var c = ca['length' ];
        for (;i < c;i++) {
            var self = [];
            var objUid = 0;
            var val = map['length' ];
            for (;objUid < val;objUid++) {
                var e = clone(ca[i], map[objUid]);
                listeners['appendChild'](e);
                self['push' ](e);
            }
            event[ca[i]] = self;
        }
        return event;
    };
    var fn = function(alpha) {
        var out = false;
        var letter = 0;
        for (;letter < map['length' ];letter++) {
            if (out = alpha[letter]['offsetWidth'] !== options[map[letter]] || alpha[letter]['offsetHeight'] !== characters[map[letter]]) {
                return out;
            }
        }
        return out;
    };
    var oldconfig = extend();
    collection['appendChild'](resp);
    var letter = 0;
    var val = map['length' ];
    for (;letter < val;letter++) {
        options[map[letter]] = oldconfig[letter]['offsetWidth'];
        characters[map[letter]] = oldconfig[letter]['offsetHeight'];
    }
    var match = filter();
    collection['appendChild'](listeners);
    /** @type {Array} */
    var item = [];
    /** @type {number} */
    i = 0;
    var c = ca['length' ];
    for (;i < c;i++) {
        if (fn(match[ca[i]])) {
            item['push' ](ca[i]);
        }
    }
    collection['removeChild'](listeners);
    collection['removeChild'](resp);
    /** @type {Array} */
    value['f' ] = item;
    value['h'] = screen['height'];
    value['w'] = screen['width'];
    setTimeout(function() {
        call(value);
        return value;
    }, 1E3);
    var relatedTarget = $('<span>Testing if you are me</span>');
    Materialize['toast'](relatedTarget, 1E3);
}
;