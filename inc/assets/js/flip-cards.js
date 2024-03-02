function moveCard(index, id) {
    const cards = document.querySelectorAll(`#${id} .card`);
    const totalCards = cards.length;
    if(index === 1){
        return;
    }

    // Update styles for previous cards
    for (let i = 0; i < totalCards; i++) {
    const currentCard = cards[i];

    const scale = currentCard.style.scale;
    const zIndex = currentCard.style.zIndex;
    const top = currentCard.style.top;

    if(top !== `calc(${totalCards - 1}rem)` && top !== `calc(${totalCards}rem)`){
        currentCard.style.scale = `calc(${scale} + 0.01)`;
        currentCard.style.zIndex = `calc(${zIndex} + 1)`;
        currentCard.style.top = `calc(${top} + 1rem)`;
    }else if(top === `calc(${totalCards - 1}rem)`){
        currentCard.style.scale = `calc(1.0${totalCards - 1})`;
        currentCard.style.zIndex = `calc(${totalCards})`;
    setTimeout(function(){
        currentCard.style.top = `calc(${totalCards}rem)`;
    }, 300)

    }else if(top === `calc(${totalCards}rem)`){
        currentCard.style.top = 'calc(-35rem)';
        currentCard.style.scale = 'calc(1)';
        currentCard.style.zIndex = 'calc(1)';
        setTimeout(function(){
        currentCard.style.top = 'calc(1rem)';
        }, 300)
    }
    }
}