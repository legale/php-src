#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include <stddef.h>

#include "mbfilter.h"
#include "nls_uni.h"

static const char *mbfl_language_uni_aliases[] = {"universal", NULL};

const mbfl_language mbfl_language_uni = {
	mbfl_no_language_uni,
	"uni",
	"uni",
	(const char *(*)[]) &mbfl_language_uni_aliases,
	mbfl_no_encoding_utf8,
	mbfl_no_encoding_base64,
	mbfl_no_encoding_base64
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
