// Constructor function for a Game

function Game(difficulty) {
  this.lives = 3;
  this.score = 0;
  this.bullet_count = 3;
  $(".shell_1").show();
  $(".shell_2").show();
  $(".shell_3").show();
  $(".live_1").show();
  $(".live_2").show();
  $(".live_3").show();
  $("#white_flash").hide();
  $("#click").hide();

  // Set the difficulty- easy by default
  if(typeof(difficulty) === "undefined") {
    this.speed = this.difficulty.легко;
  }
  else {
    this.speed = this.difficulty[difficulty];
  }

  // Kick-off the first wave of Ducks
  this.nextRound();
}

// Maps difficulty to speed at which a Duck traverses the screen in milliseconds.
Game.prototype.difficulty = {
  легко: 5000,
  средне: 3500,
  сложно: 2000
}

Game.prototype.nextRound = function() {

  if(this.speed>1000)
    this.speed-=10;
  
  $(".shell_1").show();
  $(".shell_2").show();
  $(".shell_3").show();
  
  var duck = new Duck(this);
  var duck = new Duck(this);
  var _this = this;
  _this.bullet_count = 3;
  
  $('#game').unbind("click");
  $('#game').click(function () {
    if (_this.bullet_count > 0) {
      $('#white_flash').show(0).delay(10).hide(2);
    } else { 
      $('#click').show(0).delay(30).hide(5);
    }
    
    switch(_this.bullet_count)
    {
        case 3:
            $(".shell_1").hide();
            break;
        case 2:
            $(".shell_2").hide();
            break;
        case 1:
            $(".shell_3").hide();
            break;
        default:
            break;
    }
    _this.bullet_count -= 1;
  });

  var roundTimer = setTimeout(function() {
    if(_this.lives <= 0) {
      _this.gameOver();
    }
    else {
      _this.nextRound();
    }
  }, this.speed + 500);
}

Game.prototype.gameOver = function() {
  $("#points").html(this.score);
  $("#game-over").toggle();
}

Game.prototype.addScore = function(points) {
  this.score += points;

  $('#score').text(this.score);
}