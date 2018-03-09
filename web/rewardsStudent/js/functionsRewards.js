$(document).ready(function () {
	var globals = {};
	globals.rewardId = 0;
	globals.costReward = 0;

	var url = "http://localhost:8888/L-earn/web/rewardsStudent/rewardsStudent.php";

	var sendCost = function (rewardId, costReward) {
		var data = {
			action: "updatePoints",
			costReward: costReward,
			rewardId: rewardId
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				$("#popup-wrapper").remove();
				$(".popupReward").remove();
				$("#"+rewardId+"").removeClass("reward");
				$("#"+rewardId+"").addClass("reward disabled-reward");
				$(".reward").css("pointer-events", "auto");

				var pointsUpdate = JSON.parse(result);
				var previousValue = $("#headPoints").text();

				$("#headPoints").prop("Counter", previousValue).animate({
					Counter: pointsUpdate
				},{
					duration: 1000,
					easing: "swing",
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}
		});
	};

	var showAllRewards = function () {
		var data = {
			action: "getRewards"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){

					var linkReward = document.createElement("div");
					linkReward.setAttribute("class", "reward reticule-item");
					linkReward.setAttribute("id", elem.RecomId);

					var nameReward = document.createElement("div");
					nameReward.setAttribute("id", "nameReward");
					nameReward.innerHTML = elem.RecomName;

					var costReward = document.createElement("div");
					costReward.setAttribute("id", "costReward");

					var costRewardPoints = document.createElement("span");
					costRewardPoints.setAttribute("id", "costRewardPoints");
					costRewardPoints.innerHTML =elem.RecomCost;

					var costRewardData = document.createElement("span");
					costRewardData.innerHTML = " PTOS.";

					costReward.append(costRewardPoints);
					costReward.append(costRewardData);

					var btnReward = document.createElement("button");
					btnReward.innerHTML = "Obtener recompensa";

					linkReward.append(nameReward);
					linkReward.append(costReward);
					linkReward.append(btnReward);

					$("#reticule").append(linkReward);

					showRewardsGotten();
				});
				$(".reward").click(function() {

					globals.rewardId = $(this).attr("id");
					globals.costReward = $(this).find("#costRewardPoints").text();

					var popupWrapper = document.createElement("div");
					popupWrapper.setAttribute("id", "popup-wrapper");

					var popupReward = document.createElement("div");
					popupReward.setAttribute("class", "popupReward");
					popupWrapper.append(popupReward);

					var popupClose = document.createElement("div");
					popupClose.setAttribute("class", "rewCancel popupRewardClose");

					var popupCloseImg = document.createElement("img");
					popupCloseImg.setAttribute("alt", "Cerrar");
					popupCloseImg.setAttribute("src", "http://localhost:8888/L-earn/web/img/icons/cross.svg");
					popupClose.append(popupCloseImg);

					var codeReward = document.createElement("div");
					codeReward.innerHTML = "Tu código es ";

					var codeNumber = document.createElement("div");
					codeNumber.setAttribute("id", "codeNumber");
					codeNumber.innerHTML = Math.floor((Math.random() * 10000) + 1);

					codeReward.append(codeNumber);

					var popupButtons = document.createElement("div");
					popupButtons.setAttribute("id", "popupButtons");

					var btnCodeYes = document.createElement("button");
					btnCodeYes.setAttribute("id", "rewYes");
					btnCodeYes.innerHTML = "Obtener";

					var btnCodeNo = document.createElement("button");
					btnCodeNo.setAttribute("class", "rewCancel");
					btnCodeNo.innerHTML = "Cancelar";

					popupButtons.append(btnCodeYes);
					popupButtons.append(btnCodeNo);

					popupReward.append(popupClose);
					popupReward.append(codeReward);
					popupReward.append(popupButtons);

					$("body").append(popupWrapper);

					$(".reward").css("pointer-events", "none");

					$(".rewCancel").on("click", function() {
						$("#popup-wrapper").remove();
						$(".popupReward").remove();
						$(".reward").css("pointer-events", "auto");
					})

					$("#rewYes").on("click", function() {
						sendCost(globals.rewardId, globals.costReward);
					});

				});

      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}
	showAllRewards();

	var showRewardsGotten = function () {
		var data = {
			action: "getRewardsGotten"
		};

		$.ajax({
			url: url,
			data: data,
			method: "POST",
			success: function (result) {
				resultArray = JSON.parse(result);

				resultArray.forEach(function(elem){
					if (elem.RelRecomId != null) {
						$("#"+elem.RelRecomId).addClass("disabled-reward");
					}
				});

      		},
			error: function (jqXHR, textStatus, errorThrown) {
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}

		});
	}

});
