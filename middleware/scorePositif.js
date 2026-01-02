export default function ({ store, redirect }) {
    // Si l'utilisateur n'est pas authentifié
    if (store.state.miniQuizz.score.score[1] < 1) {
        return redirect('/miniquizz')
    }
}