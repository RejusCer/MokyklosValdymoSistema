let grade = document.querySelector('#grade')

grade.addEventListener('change', function(){
    if (grade.value > 10)
    {
        grade.value = 10
    }
    if (grade.value < 1)
    {
        grade.value = 1
    }
})