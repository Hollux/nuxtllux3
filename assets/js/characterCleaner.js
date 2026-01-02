// nettoyage des charactères spéciaux
export function characterCleaner(val) {
    var valSplit = val.split('')
    var valOut = []
    var valLen = valSplit.length
    var accents = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž'
    var accentsOut = 'AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz'
    for (var y = 0; y < valLen; y++) {
        if (accents.indexOf(valSplit[y]) !== -1) {
            valOut[y] = accentsOut.substr(accents.indexOf(valSplit[y]), 1)
        } else {
            valOut[y] = valSplit[y]
        }
    }
    valOut = valOut.join('')
    return valOut.toLowerCase()
}