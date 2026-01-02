export function base(action) {
    // tableau de base
    var array = arrayResponse()

    // si pas de tableau de base, on le créer
    if (Vue.localStorage.get('arrayActive') === null || action === 'new') {
        Vue.localStorage.set('arrayScore', JSON.stringify([0, 0]))
        Vue.localStorage.set('arrayActive', JSON.stringify(array))
        Vue.localStorage.set('arrayResponses', JSON.stringify([]))
        var intQuestion = intActiArray(array)
        Vue.localStorage.set('intQuestion', JSON.stringify(intQuestion))
    } else if (JSON.parse(Vue.localStorage.get('arrayActive')).length === 0) {
        alert('la partie est terminé (pour une nouvelle clic new game et F5')
    }
}