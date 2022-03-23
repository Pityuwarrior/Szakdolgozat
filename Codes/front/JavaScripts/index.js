class scrollToTop{

    constructor(){
       this.button = document.getElementById('up');
    }

    checkPagePosition(){
        const Pageposition = document.documentElement.scrollTop || document.body.scrollTop;
        const Pagebool = Pageposition > 20;
        this.Pagebool2(Pagebool);
    }

    Pagebool2(Pagebool)
    {
        if(Pagebool)
        {
            this.button.style.display = "block"
        }
        else
        {
            this.button.style.display = "none"
        }
    }

    buttonPush(){
        document.documentElement.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
        document.body.scrollTo({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    }
}
const valami = new scrollToTop();
valami.checkPagePosition();
valami.button.addEventListener("click", () =>{
    valami.buttonPush();
});
window.addEventListener("scroll",  () =>{
    valami.checkPagePosition();
});
class scrollBlock{  
    disable(){
        document.documentElement.classList.add('disable-scroll');
        document.body.classList.add('disable-scroll');
    }
      
    enable(){
        document.documentElement.classList.remove('disable-scroll');
        document.body.classList.remove('disable-scroll');
    }
    
    constructor(){  
        const check = document.querySelector('#check');
        check.addEventListener('click', () =>{
            if(check.checked)
            {
                this.disable();
            }
            else
            {
                this.enable();
            }
        });
    }
}
const scrollblock = new scrollBlock();
