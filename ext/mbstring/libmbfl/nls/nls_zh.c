#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <stddef.h>

#include "mbfilter.h"
#include "nls_zh.h"

const mbfl_language mbfl_language_simplified_chinese = {
	mbfl_no_language_simplified_chinese,
	"Simplified Chinese",
	"zh-cn",
	NULL,
	mbfl_no_encoding_hz,
	mbfl_no_encoding_base64,
	mbfl_no_encoding_7bit
};

const mbfl_language mbfl_language_traditional_chinese = {
	mbfl_no_language_traditional_chinese,
	"Traditional Chinese",
	"zh-tw",
	NULL,
	mbfl_no_encoding_big5,
	mbfl_no_encoding_base64,
	mbfl_no_encoding_8bit
};

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: t
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
