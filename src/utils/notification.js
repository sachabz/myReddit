export function getNotif() {
    const NOTIFICATION_TITLE = 'Nouveau post créé'
    const NOTIFICATION_BODY = 'Yeah, tu aggrandis le contenu de myreddit! Félicitations.'
    const CLICK_MESSAGE = 'Notification cliquée'

    new Notification(NOTIFICATION_TITLE, { body: NOTIFICATION_BODY })
        .onclick = () => document.getElementById("output").innerText = CLICK_MESSAGE
}