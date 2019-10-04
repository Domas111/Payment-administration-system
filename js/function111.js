/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var questions = [
  {question:"Koks jūsų vardas?"},
  {question:"Kokia jūsų pavardė?"},
  {question:"Elektronio pašto adresas?", pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/},
  {question:"Sukurkite naują slaptažodį", type: "password"}
]


;(function(){

  var tTime = 100  // ??????????????
  var wTime = 200  // transimisja???????????????
  var eTime = 1000 // trasnmisija kaip reaguoja ????????????????

  // init
  // --------------
  var position = 0

  putQuestion()

  progressButton.addEventListener('click', validate)
  inputField.addEventListener('keyup', function(e){
    transform(0, 0) // gauni
    if(e.keyCode == 13) validate()
  })

  // functions
  // --------------

  // visi tavoatsakymai
  function putQuestion() {
    inputLabel.innerHTML = questions[position].question
    inputField.value = ''
    inputField.type = questions[position].type || 'text'  
    inputField.focus()
    showCurrent()
  }
  
  // gauna tada kai visi atsakyti ir boom
  function done() {
    
    // istrina jei netiesa
    register.className = 'close'
    
    // add the h1 at the end with the welcome text
    var h1 = document.createElement('h1')
    h1.appendChild(document.createTextNode('Sveiki ' + questions[0].value + '!'))
    setTimeout(function() {
      register.parentElement.appendChild(h1)     
      setTimeout(function() {h1.style.opacity = 1}, 50)
    }, eTime)
    
  }

  // reziumė
  function validate() {

    // sisisirnk kas yra
    questions[position].value = inputField.value

    // maatch
    if (!inputField.value.match(questions[position].pattern || /.+/)) wrong()
    else ok(function() {
      
      // progresas
      progress.style.width = ++position * 100 / questions.length + 'vw'

      // nėra atsakymu
      if (questions[position]) hideCurrent(putQuestion)
      else hideCurrent(done)
             
    })

  }

  // helper
  // --------------

  function hideCurrent(callback) {
    inputContainer.style.opacity = 0
    inputProgress.style.transition = 'none'
    inputProgress.style.width = 0
    setTimeout(callback, wTime)
  }

  function showCurrent(callback) {
    inputContainer.style.opacity = 1
    inputProgress.style.transition = ''
    inputProgress.style.width = '100%'
    setTimeout(callback, wTime)
  }

  function transform(x, y) {
    register.style.transform = 'translate(' + x + 'px ,  ' + y + 'px)'
  }

  function ok(callback) {
    register.className = ''
    setTimeout(transform, tTime * 0, 0, 10)
    setTimeout(transform, tTime * 1, 0, 0)
    setTimeout(callback,  tTime * 2)
  }

  function wrong(callback) {
    register.className = 'wrong'
    for(var i = 0; i < 6; i++) // pabaiga chebra
      setTimeout(transform, tTime * i, (i%2*2-1)*20, 0)
    setTimeout(transform, tTime * 6, 0, 0)
    setTimeout(callback,  tTime * 7)
  }

}())

