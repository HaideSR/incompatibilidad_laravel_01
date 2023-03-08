const nextBtn = document.getElementById('next')
const prevBtn = document.getElementById('prev')
const grupos  = document.getElementById('grupos')?.children
const tabs    = document.getElementById('grupotabs')?.children
const totalGrupos = grupos ? grupos.length : 0
const cantTabs = tabs ? tabs.length : 0
const alert = document.getElementById('alert-n')

for (let j = 0; j < cantTabs; j++) {
   const item = tabs[j].children[0]
   item.addEventListener('click', e =>{
      const itemClic = e.target.closest('li')
      buscarTabItem( itemClic )
   })
}

nextBtn?.addEventListener('click', () => {
   const nroIndex = actualIndex()
   if(nroIndex >= totalGrupos){
      showItem(totalGrupos)
   }else{
      showItem(nroIndex + 1)
   }
});

prevBtn?.addEventListener('click', () => {
   const nroIndex = actualIndex()
   if(nroIndex > 1){
      showItem(nroIndex - 1)
   }else{
      showItem(1)
   }
});

function showItem(indexShow){
   sessionStorage.setItem('indexShow', indexShow)
   validarBtns(indexShow)
   let cantGs = grupos ? grupos.length : 0
   for (let i = 0; i < cantGs; i++) {
      grupos[i].classList.remove('d-show')
      tabs[i].classList.remove('form-stepper-active')
      if(i+1 == indexShow){
         grupos[i].classList.add('d-show')
         tabs[i].classList.add('form-stepper-active')
         //estado
         activeBTN(i)
         
      }
   }
}

function validarBtns(indexShow){
   if(!nextBtn) return;
   if(!prevBtn) return;
   if(indexShow == 1){
      prevBtn.setAttribute('disabled', true)
   }else{
      prevBtn.removeAttribute('disabled')
   }
   if(indexShow == totalGrupos){
      nextBtn.setAttribute('disabled', true)
   }else{
      nextBtn.removeAttribute('disabled')
   }
}

function actualIndex(){
   const nroIndex = sessionStorage.getItem('indexShow')
   return parseInt(nroIndex) ? parseInt(nroIndex) : 1
}

function initShow(){
   const nroIndex = actualIndex()
   showItem(nroIndex)
   if(grupos && grupos.length){
      validarOpciones()
   }
}

function buscarTabItem(itemClick){
   for (let j = 0; j < tabs.length; j++) {
      if(tabs[j] == itemClick){
         showItem(j+1)
      }
   }
}

initShow();

function validarOpciones(){
   let items = [...grupos]
   items.forEach((el, index) => {
      let estado = el.dataset.empty
      if(estado === 'true'){
         console.log(estado);
         tabs[index+1]?.classList.add('op-disabled')
      }
   });
}

function activeBTN(i){
   let estado = grupos[i].dataset.empty
   if(estado === 'true'){
      nextBtn.classList.add('op-disabled')
      alert.style.display = 'block'
   }else{
      alert.style.display = 'none'
      nextBtn.classList.remove('op-disabled')
   }
   if(i == 5){
      alert.style.display = 'none'
   }
}

// let estadoNext = items[index-1].dataset.empty
      // if(estadoNext === 'true'){
         // nextBtn.classList.add('op-disabled')
      // }