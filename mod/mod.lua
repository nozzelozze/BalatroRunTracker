--- STEAMODDED HEADER
--- MOD_NAME: Share Run
--- MOD_ID: ShareRun
--- MOD_AUTHOR: [nozzelozze]
--- MOD_DESCRIPTION: Share your run
--- DEPENDENCIES: [Steamodded>=1.0.0~ALPHA-0812d]

----------------------------------------------
------------MOD CODE -------------------------

function G.FUNCS.share_button(arg_736_0)
	G.SETTINGS.paused = true

end

local createOptionsRef = create_UIBox_win
function create_UIBox_win()
	contents = createOptionsRef()
	local share_button = UIBox_button({
		minw = 5,
		button = "share_button",
		label = {
			"Win Button"
		}
	})

	--table.insert(contents.nodes[1], #contents.nodes[1] + 1, share_button)
	return contents
end

----------------------------------------------
------------MOD CODE END----------------------
