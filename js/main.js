window.onload = () => {

    // show navigation bar function

    window.addEventListener('scroll', () => {
        showNavigation();
    });

    function showNavigation() {
        let breakPoint = document.querySelector('#asideBottom');
        let showNav = breakPoint.offsetTop;
        
        let windowYOffset = window.pageYOffset;
        let nav = document.querySelector('nav');
        
        if(windowYOffset >= showNav) {
            nav.style.display = 'flex';
        } else {
            nav.style.display = '';
        }
    }

    //////////////   end   ////////////////

    // display skills function

    function listSkill() {
        const li = document.querySelectorAll('.left ul>li');
        const rightSkillDiv = document.getElementsByClassName('right');

        li.forEach((el) => {
            el.addEventListener('click', function() {
                rightSkillDiv[0].style.opacity = '1';
                getSkillJson(el);
            });
        });

    }


    listSkill();

    function getSkillJson(e) {
        e = e || window.event;
        const input = e.target || e.srcElement;
        const rightSkillDiv = document.getElementsByClassName('right');

        fetch('js/skills.json')
            .then((res) => res.json())
            .then((data) => {
                let output = '';
                for(let ind of data) {
                    if(ind.id === e.textContent) {
                        output += `
                            <p>
                                ${ind.text}
                            </p>
                        `;
                    }
                }
                rightSkillDiv[0].innerHTML = output;

            })
            .catch((err) => console.log(err))
    }


    //////////////   end   ////////////////



    // get json description of projects functionn

    function getDescriptionFromJson(e) {
        
        e = e || window.event;
        const input = e.target || e.srcElement;
        const attr = input.getAttribute('for');

        fetch('js/projectDescription.json')
            .then((res) => res.json())
            .then((data) => {
                let output = '';
                const btn = document.getElementById('btnRedirect');

                for(let ind of data) {
                    
                    if(ind.id === attr) {
                        output += `
                            <p>
                                ${ind.text}
                            </p>
                        `;

                        btn.addEventListener('click', () => {
                            window.open(ind.page, '_blank');
                        });
                    }
                }
                document.getElementById('outputFromRadioBtn').innerHTML = output;
            })
            .catch((err) => console.log(err));
            
    }

    let label = document.querySelectorAll('li > label');
    label.forEach((val) => {
        val.addEventListener('click', getDescriptionFromJson, false);
    });



    //////////////   end   ////////////////



    // form function colorized

    let input = document.querySelectorAll('input[type="text"]');
    let textarea = document.querySelector('textarea');

    input.forEach((index) => {

        index.addEventListener('click', function(e) {
            e = e || window.event;
            let input = e.target || e.srcElement;
            let label = input.previousElementSibling;
            let value = input.value;

            if(index) {
                styleFunc();
            }

            input.onblur = blurFunc;

            function blurFunc() {
                label.style.opacity = '0';
                input.setAttribute('placeholder', input.name);
                input.style.backgroundColor = '#343334';
                input.style.border = 'none';
                input.style.borderBottom = '1px groove #b8c1c1';
            }

            function styleFunc() {
                input.removeAttribute('placeholder');
                input.style.border = '1px solid #047cc0';
                input.style.backgroundColor = '#272727';
                label.style.opacity = '1';
                label.style.backgroundColor = '#272727';
                label.style.borderBottom = '1px solid #272727';
            }

            if(value == '' || value == null) {
                label.style.border = '1px solid #047cc0';
                label.style.borderBottom = '1px solid #272727';
            }
            
        });

        index.addEventListener('keypress', function(e) {
            e = e || window.event;
            let input = e.target || e.srcElement;
            let label = input.previousElementSibling;

            label.style.border = '1px solid #272727';
            
        });

    }); 


    textarea.addEventListener('click',  function(e) {
        e = e || window.event;
        let input = e.target || e.srcElement;

        if(input) {
            styleFunc();
        }

        function styleFunc() {
            input.style.border = '1px solid #047cc0';
        }

        input.onblur = blurFunc;

        function blurFunc() {
            input.style.border = '1px solid #b8c1c1';
        }
    });
    
 

    //////////////   end   //////////////

    //   validate e-mail   

    let btn = document.getElementById('btn-submit');

    btn.addEventListener('click', checkEmail);

    function checkEmail() {

        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            alert('Please provide a valid email address');
            email.focus;
            return false;
        }
    }

    //////////////   end   ////////////////
}